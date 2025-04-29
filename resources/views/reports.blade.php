<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 leading-tight">
            Report Management
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Filter & Create Actions -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Filter Reports</h3>
                </div>

                <!-- Filters Form -->
                <form action="{{ route('reports') }}" method="GET" class="space-y-8 flex flex-wrap items-end gap-2" aria-label="Report Filters">
                    @csrf
                    <!-- Search Input -->
                    <div class="flex flex-col">
                        <label for="search" class="text-sm text-gray-700 dark:text-gray-300 mb-1">Search by Title or User</label>
                        <input id="search" type="text" name="user" id="user" placeholder="e.g. Sales Report, John Doe"
                            class="border-gray-300 dark:border-gray-600 rounded-lg text-sm py-2 px-3 focus:ring-2 focus:ring-blue-500 w-60" />
                    </div>

                    <!-- Status Filter -->
                    <div class="flex flex-col">
                        <label for="status" class="text-sm text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select id="status" name="status"
                            class="border-gray-300 dark:border-gray-600 rounded-lg text-sm py-2 px-3 focus:ring-2 focus:ring-blue-500 w-48">
                            <option selected>All Status</option>
                            <option>Completed</option>
                            <option>Pending</option>
                            <option>Failed</option>
                        </select>
                    </div>

                    <!-- Date Range Filters -->
                    <div class="flex flex-col">
                        <label for="start-date" class="text-sm text-gray-700 dark:text-gray-300 mb-1">Start Date</label>
                        <input id="start-date" type="date" name="start_date"
                            class="border-gray-300 dark:border-gray-600 rounded-lg text-sm py-2 px-3 focus:ring-2 focus:ring-blue-500 w-48" />
                    </div>

                    <div class="flex flex-col">
                        <label for="end-date" class="text-sm text-gray-700 dark:text-gray-300 mb-1">End Date</label>
                        <input id="end-date" type="date" name="end_date"
                            class="border-gray-300 dark:border-gray-600 rounded-lg text-sm py-2 px-3 focus:ring-2 focus:ring-blue-500 w-48" />
                    </div>

                    <!-- Apply Filters Button -->
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-end">
                        {{-- <label class="text-sm text-transparent mb-1">.</label> <!-- Spacer --> --}}
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded-lg flex items-center gap-2 transition duration-200">
                            <i class="fas fa-filter"></i><span>Apply Filters</span>
                        </button>
                        <a href="{{ route('reports') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white text-sm py-2 px-4 rounded-lg flex items-center gap-2 transition duration-200">
                            <i class="fas fa-undo-alt"></i><span>Reset</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Report Actions and Table -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-x-auto p-4">
                <!-- Action Buttons -->
                <div class="flex justify-end mb-4">
                    <a href="{{route('openreportform')}}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded-md flex items-center space-x-2 transition duration-200 me-2">
                        <i class="fas fa-plus-circle me-1"></i><span>Create New Report</span>
                    </a>
                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white text-sm py-2 px-4 rounded-md flex items-center space-x-2 transition duration-200">
                        <i class="fas fa-file-export me-1"></i><span>Export Reports</span>
                    </a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Reports Table -->
                <table class="min-w-full text-sm text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-left text-xs uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-3">Report Title</th>
                            <th class="px-6 py-3">Date Generated</th>
                            <th class="px-6 py-3">Created By</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($reportlist as $val)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4">{{ $val->title }}</td>
                            <td class="px-6 py-4">{{ $val->date_of_rt }}</td>
                            <td class="px-6 py-4">{{ $val->reported_by }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">{{ $val->status }}</span>
                            </td>
                            <td class="px-6 py-4 flex space-x-3">
                                <a href="javascript:void(0)" onclick="openViewModal({{ $val->id }})" class="hover:text-blue-600 flex items-center space-x-1 transition duration-150 me-3" title="View Report">
                                    <i class="fas fa-eye me-1"></i><span>View</span>
                                </a>
                                <a href="javascript:void(0)" onclick="openViewModal({{ $val->id }})" class="hover:text-blue-600 flex items-center space-x-1 transition duration-150 me-3" title="View Report">
                                    <i class="fas fa-pencil me-1"></i><span>Edit</span>
                                </a>
                                <a href="{{ route('download.report.pdf', $val->id) }}" class="hover:text-gray-600 flex items-center space-x-1 transition duration-150 me-3" title="Print Report">
                                    <i class="fas fa-print me-1"></i><span>Print</span>
                                </a>
                                <a href="javascript:void(0)" onclick="openEmailModal({{ $val->id }})"
                                    class="hover:text-indigo-600 flex items-center space-x-1 transition duration-150 me-3" title="Email Report">
                                    <i class="fas fa-envelope me-1"></i><span>Email</span>
                                </a>
                                <a href="javascript:void(0)" onclick="confirmDelete({{ $val->id }})"
                                    class="hover:text-red-600 flex items-center space-x-1 transition duration-150 me-3" title="Delete Report">
                                     <i class="fas fa-trash me-1"></i><span>Delete</span>
                                </a>
                                 
                                
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                <i class="fas fa-exclamation-circle text-xl text-red-400 mb-2"></i><br>
                                No reports found matching your criteria.
                            </td>
                        </tr>
                    @endforelse          
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Email Modal -->
    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="" action="{{route('send.report.email')}}" method="post" enctype="multipart/form-data" class="modal-content shadow-lg border-0 rounded-lg">
                @csrf
                <input type="hidden" name="report_id" id="modal_report_id">

                <div class="modal-header bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                    <h5 class="modal-title" id="emailModalLabel">
                        <i class="fas fa-envelope me-2"></i>Send Report via Email
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <div class="mb-3">
                        <label for="to_email" class="form-label fw-semibold">To Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="to_email" name="to_email" placeholder="recipient@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="to_name" class="form-label fw-semibold">To Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="to_name" name="to_name" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject here..." required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-semibold">Content/Body <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter content/body here..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="attachment" class="form-label fw-semibold">Attachment</label>
                        <input type="file" class="form-control" id="attachment" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx">
                        <small class="text-muted">Optional – only PDF, DOC, DOCX, XLS, XLSX supported</small>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between px-4 py-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i>Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- VIEW Modal -->
   <!-- Report Details Modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1" aria-labelledby="viewReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg border-0 rounded-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewReportModalLabel">
                    <i class="fas fa-file-alt me-2"></i>Report Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Loading...</p>
            </div>
           

            <div class="modal-footer px-4 py-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
