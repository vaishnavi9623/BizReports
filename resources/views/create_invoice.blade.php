<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white leading-tight">
            🧾Create Invoice
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-white dark:bg-gray-900 p-10 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 space-y-12">
                <form method="POST" action="{{route('save.invoice')}}" class="space-y-12">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="">
                            <label for="invoice_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Invoice Title <span class="text-danger font-bold">*</span>
                            </label>
                               <input type="text" name="invoice_title" placeholder="Invoice T"
                                class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 py-2 px-4 text-sm shadow-sm" />
                                @error('invoice_title')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Invoice No <span class="text-danger font-bold">*</span></label>
                            <input type="text" name="invoice_no" placeholder="01/25-26"
                                class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 py-2 px-4 text-sm shadow-sm" />
                                @error('invoice_no')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                            </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date <span class="text-danger font-bold">*</span></label>
                            <input type="date" name="invoice_date"
                                class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 py-2 px-4 text-sm shadow-sm" />
                                @error('invoice_date')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                            </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Client Details <span class="text-danger font-bold">*</span></label>
                        <textarea name="client_details" rows="3"
                            placeholder="M/s Dehu Engineering (India) Pvt. Ltd. Gat No 390..."
                            class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 py-2 px-4 text-sm shadow-sm"></textarea>
                            @error('client_details')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                            @enderror
                    </div>
                    <div class="overflow-x-auto">
                        <table id="items-table" class="w-full text-sm border border-gray-300 dark:border-gray-700 shadow-sm">
                            <thead class="bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-gray-200">
                                <tr class="text-left">
                                    <th class="p-3 border">S. No</th>
                                    <th class="p-3 border">Description</th>
                                    <th class="p-3 border">Quantity</th>
                                    <th class="p-3 border">Rate</th>
                                    <th class="p-3 border">Amount</th>
                                </tr>
                            </thead>
                            <tbody id="items-tbody" class="text-gray-700 dark:text-gray-100">
                                <tr class="item-row">
                                    <td class="border p-3">1</td>
                                    <td class="border p-3">
                                        <input type="text" name="item_desc[]" id="item_desc"
                                            value="RT INSPECTION CHARGES - Film Size 4XS (Resonance)"
                                            class="w-full bg-transparent outline-none item_desc" />
                                    </td>
                                    <td class="border p-3">
                                        <input type="text" name="item_qty[]" id="item_qty" value="0" onkeyup="CalculateTotal()"
                                            class="w-full bg-transparent outline-none item_qty"  />
                                    </td>
                                    <td class="border p-3">
                                        <input type="text" name="item_rate[]" id="item_rate" value="0" onkeyup="CalculateTotal()"
                                            class="w-full bg-transparent outline-none item_rate" />
                                    </td>
                                    <td class="border p-3">
                                        <input type="text" name="item_amount[]" id="item_amount" value="0"
                                            class="w-full bg-transparent outline-none item_amount" readonly />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" id="add-item-row" class="mt-4 text-blue-600 hover:text-blue-700 text-sm font-semibold">
                            + Add Item
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Before Tax <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="subtotal" value="0" id="subtotal" readonly
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                @error('subtotal')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">SGST (9%) <span class="text-danger font-bold">*</span></label>
                                    <input type="text" name="sgst" value="0" id="sgst" readonly
                                        class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                    @error('sgst')
                                        <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                    @enderror
                                    </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">CGST (9%) <span class="text-danger font-bold">*</span></label>
                                    <input type="text" name="cgst" value="0" id="cgst" readonly
                                        class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                    @error('cgst')
                                        <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                    @enderror
                                    </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total After Tax <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="grand_total" value="0" id="grand_total" readonly
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                @error('grand_total')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount in Words <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="amount_in_words" id="amount_in_words" value="Zero Only" readonly
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                @error('amount_in_words')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-300 dark:border-gray-700 pt-8">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">🏦 Bank Details</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bank Name <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="bank_name" value="SARASWAT BANK"
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                    @error('bank_name')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Account Number <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="account_no" value="4401010100000609"
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                    @error('account_no')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">IFSC Code <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="ifsc_code" value="SRCB0000440"
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                    @error('ifsc_code')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">GST Number <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="gst_no" value="27AAVFB7699D1ZP"
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm" />
                                    @error('gst_no')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address <span class="text-danger font-bold">*</span></label>
                                <textarea name="bank_address" rows="3"
                                    class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-2 px-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm">Plot No. PAP/96, 5 Block, Indrayani Nagar, MIDC Near HP Petrol Pump, Bhosari Pune – 411026</textarea>
                                    @error('bank_address')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                                </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-2">
                            <div>
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Status <span class="text-danger font-bold">*</span></label>
                                <select name="status" id="status"
                                    class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                                    <option value="Draft">Draft</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Pending">Pending</option>
                                </select>
                                @error('status')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Generated By <span class="text-danger font-bold">*</span></label>
                                <input type="text" name="generated_by" value="{{ Auth::user()->name }}" id="generated_by"
                                    class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                                    @error('generated_by')
                                    <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                    <div class="flex justify-between pt-6">
                        <a href="{{'invoice'}}" class="text-sm text-gray-600 hover:text-gray-800 underline">← Back</a>

                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-8 py-3 rounded-md shadow transition duration-200">
                            Save Invoice
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-item-row').addEventListener('click', function() {
            let tableBody = document.getElementById('items-tbody');
            let newRow = tableBody.querySelector('.item-row').cloneNode(true);

            newRow.querySelectorAll('input').forEach(input => input.value = '');

            let newRowIndex = tableBody.querySelectorAll('.item-row').length + 1;
            newRow.querySelectorAll('td')[0].innerText = newRowIndex; // Update S. No

            tableBody.appendChild(newRow);
        });
    </script>
</x-app-layout>
