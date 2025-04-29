<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(id) {
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
        
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/report/delete/${id}`,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: csrfToken,
                            },
                            success: function (response) {
                                Swal.fire("Deleted!", "The report has been deleted.", "success").then(() => {
                                    location.reload();
                                });
                            },
                            error: function (xhr) {
                                Swal.fire("Error!", xhr.responseJSON.message || "Something went wrong.", "error");
                            }
                        });
                    } else {
                        Swal.fire('Cancelled', 'Your report is safe.', 'info');
                    }
                });
            }
        
            function openEmailModal(reportId) {
                $('#modal_report_id').val(reportId);
                $('#emailModal').modal('show');
            }
        
            function openViewModal(reportId) {
                // alert(reportId);
                $('#modal_report_id').val(reportId);
        
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
        
                $.ajax({
                    url: `reports/${reportId}`,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        $('#viewReportModal .modal-body').html(`
                            <div class="modal-body px-4 py-3">
                                <h5 class="mb-3 border-bottom pb-2">Report Details</h5>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Report Title:</strong>
                                        <p class="mb-1 text-muted">${response.title}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Report No:</strong>
                                        <p class="mb-1 text-muted">${response.reportno}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Client Name:</strong>
                                        <p class="mb-1 text-muted">${response.clientname}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Client Address:</strong>
                                        <p class="mb-1 text-muted">${response.clientaddress}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Job Name:</strong>
                                        <p class="mb-1 text-muted">${response.jobname}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Job No:</strong>
                                        <p class="mb-1 text-muted">${response.jobno}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Date of Report:</strong>
                                        <p class="mb-1 text-muted">${response.date_of_rt}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Type:</strong>
                                        <p class="mb-1 text-muted">${response.type}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Reported By:</strong>
                                        <p class="mb-1 text-muted">${response.reported_by}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Status:</strong>
                                        <p class="mb-1">
                                            <span class="badge bg-${response.status === 'Approved' ? 'success' : 'warning'}">${response.status}</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <strong>Description:</strong>
                                    <p class="text-muted">${response.description}</p>
                                </div>
                            </div>
                        `);

                        $('#viewReportModal').modal('show');
                    },
                    error: function () {
                        Swal.fire("Error", "Failed to load report.", "error");
                    }
                });
        
                $('#viewReportModal').modal('show');
            }
        
            function openPrintModal(reportId) {
                $('#modal_report_id').val(reportId);
                $('#printPdfModal').modal('show');
            }
        
            function CalculateTotal()
            {
                let totalbeforetax = 0;
               $('.item-row').each(function(){
                let qty = parseFloat($(this).find('.item_qty').val()) || 0;
                let rate = parseFloat($(this).find('.item_rate').val()) || 0;
                let amount = qty * rate;
                $(this).find('.item_amount').val(amount.toFixed(2));
                totalbeforetax += amount;

            })
                let sgst = totalbeforetax * 0.09;
                let cgst = totalbeforetax * 0.09;
                let totalWithGst = totalbeforetax  + sgst + cgst;
                $('#subtotal').val(totalbeforetax.toFixed(2));
                $('#sgst').val(sgst.toFixed(2));
                $('#cgst').val(cgst.toFixed(2));
                $('#grand_total').val(totalWithGst.toFixed(2));
                let amountInWords = numberToWords(Math.floor(totalWithGst));
                $('#amount_in_words').val(amountInWords);
            }
            function printSelectedContent() {
                const selectedItem = $('input[name="printItem"]:checked');
        
                if (selectedItem.length === 0) {
                    Swal.fire('No Item Selected', 'Please select an item to print.', 'warning');
                    return;
                }
        
                const itemName = selectedItem.val();
        
                const content = `
                    <div style="padding: 30px; font-family: Arial;">
                        <h2 style="text-align: center;">${itemName}</h2>
                        <p>This is a sample print preview of <strong>${itemName}</strong>.</p>
                        <p><em>Date:</em> ${new Date().toLocaleDateString()}</p>
                        <hr>
                        <p>This section will contain the detailed layout of the report or invoice.</p>
                    </div>
                `;
        
                const printWindow = window.open('', '', 'width=900,height=650');
                printWindow.document.write('<html><head><title>Print Preview</title>');
                printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">');
                printWindow.document.write('</head><body>');
                printWindow.document.write(content);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            }
        
            function numberToWords(num) {
            const ones = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine",
                        "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen",
                        "Seventeen", "Eighteen", "Nineteen"];
            const tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

            function convertSegment(n) {
                let word = "";
                if (n > 19) {
                    word += tens[Math.floor(n / 10)] + (n % 10 ? " " + ones[n % 10] : "");
                } else {
                    word += ones[n];
                }
                return word;
            }

            function segment(num) {
                let output = "";

                const crore = Math.floor(num / 10000000);
                const lakh = Math.floor((num % 10000000) / 100000);
                const thousand = Math.floor((num % 100000) / 1000);
                const hundred = Math.floor((num % 1000) / 100);
                const rest = num % 100;

                if (crore) output += convertSegment(crore) + " Crore ";
                if (lakh) output += convertSegment(lakh) + " Lakh ";
                if (thousand) output += convertSegment(thousand) + " Thousand ";
                if (hundred) output += ones[hundred] + " Hundred ";
                if (rest) output += (output ? "and " : "") + convertSegment(rest);

                return output.trim();
            }

            if (num === 0) return "Zero Rupees Only";

            return segment(num) + " Rupees Only";
        }

            // ✅ EMAIL FORM SUBMISSION — DOM ready block
            $(document).ready(function () {
                $('#emailForm').on('submit', function (e) {
                    e.preventDefault();
        
                    const formData = new FormData(this);
        
                    $.ajax({
                        url: "{{ route('send.report.email') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            Swal.fire('Success!', response.message || 'Email sent successfully.', 'success');
                            $('#emailModal').modal('hide');
                        },
                        error: function () {
                            Swal.fire('Error!', 'Something went wrong while sending the email.', 'error');
                        }
                    });
                });
            });
        </script>
        
        
    </body>

    
</html>
