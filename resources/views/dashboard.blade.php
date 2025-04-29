<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @include('components.modals.email-modal')
    @include('components.modals.printpdf-modal')

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome -->
            <div class="bg-white dark:bg-gray-800 p-4 rounded-md shadow">
                <p class="text-gray-700 dark:text-gray-200">👋 Welcome back! {{ Auth::user()->name }}.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-gradient-to-r from-blue-100 to-blue-50 dark:from-blue-900 dark:to-blue-800 p-4 rounded-md shadow flex items-center justify-between">
                    <div>
                        <p class="text-sm text-blue-600 dark:text-blue-300">Total Reports</p>
                        <h3 class="text-2xl font-semibold text-blue-900 dark:text-white">{{$totalReport}}</h3>
                    </div>
                    <i class="fas fa-file-alt text-blue-400 text-3xl"></i>
                </div>

                <div class="bg-gradient-to-r from-green-100 to-green-50 dark:from-green-900 dark:to-green-800 p-4 rounded-md shadow flex items-center justify-between">
                    <div>
                        <p class="text-sm text-green-600 dark:text-green-300">Total Invoices</p>
                        <h3 class="text-2xl font-semibold text-green-900 dark:text-white">{{$totalInvoice}}</h3>
                    </div>
                    <i class="fas fa-receipt text-green-400 text-3xl"></i>
                </div>

                <div class="bg-gradient-to-r from-yellow-100 to-yellow-50 dark:from-yellow-900 dark:to-yellow-800 p-4 rounded-md shadow flex items-center justify-between">
                    <div>
                        <p class="text-sm text-yellow-600 dark:text-yellow-300">Total Ledgers</p>
                        <h3 class="text-2xl font-semibold text-yellow-900 dark:text-white">{{$totalLedgers}}</h3>
                    </div>
                    <i class="fas fa-book text-yellow-400 text-3xl"></i>
                </div>

                <div class="bg-gradient-to-r from-red-100 to-red-50 dark:from-red-900 dark:to-red-800 p-4 rounded-md shadow flex items-center justify-between">
                    <div>
                        <p class="text-sm text-red-600 dark:text-red-300">Total Comapnies</p>
                        <h3 class="text-2xl font-semibold text-red-900 dark:text-white">{{$totalCompany}}</h3>
                    </div>
                    <i class="fas fa-building  text-red-400 text-3xl"></i>
                </div>
            </div>

           <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 p-4 rounded-md shadow-sm">
                <h5 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">⚡ Quick Actions</h5>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-sm">
                    @foreach([
                        ['icon' => 'plus-circle', 'text' => 'Add Report','link' => route('openreportform')],
                        ['icon' => 'file-invoice', 'text' => 'Add Invoice','link' => route('openinvoiceform')],
                        ['icon' => 'file-invoice', 'text' => 'Add Ledger','link' => route('openledgerform')],
                        ['icon' => 'envelope', 'text' => 'Email', 'onclick' => "openEmailModal(1)"],  
                        ['icon' => 'print', 'text' => 'Print','onclick'=>"openPrintModal(1)" ],
                        ['icon' => 'sync-alt', 'text' => 'Refresh', 'onclick' => "window.location.href = '".route('dashboard')."'"]
                        ] as $action)
                     @if(isset($action['link']))
                     <a href="{{ $action['link'] }}" 
                        class="flex items-center gap-2 justify-center px-3 py-2 rounded-md border border-gray-200 dark:border-gray-600 bg-white/70 dark:bg-gray-700/50 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 hover:shadow transition-all duration-200">
                         <i class="fas fa-{{ $action['icon'] }} text-xs"></i>
                         <span>{{ $action['text'] }}</span>
                     </a>
                 @elseif(isset($action['onclick']))
                     <button onclick="{{ $action['onclick'] }}" 
                         class="flex items-center gap-2 justify-center px-3 py-2 rounded-md border border-gray-200 dark:border-gray-600 bg-white/70 dark:bg-gray-700/50 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 hover:shadow transition-all duration-200">
                         <i class="fas fa-{{ $action['icon'] }} text-xs"></i>
                         <span>{{ $action['text'] }}</span>
                     </button>
                 @else
                     <button 
                         class="flex items-center gap-2 justify-center px-3 py-2 rounded-md border border-gray-200 dark:border-gray-600 bg-white/70 dark:bg-gray-700/50 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 hover:shadow transition-all duration-200">
                         <i class="fas fa-{{ $action['icon'] }} text-xs"></i>
                         <span>{{ $action['text'] }}</span>
                     </button>
                 @endif
                    @endforeach
                </div>
            </div>


            <!-- Table + Filters -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Reports Table -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-md shadow">
                    <h5 class="text-base font-medium text-gray-700 dark:text-gray-200 mb-4">📄 Recent Reports</h5>
                    <table class="w-full text-sm text-left">
                        <thead class="border-b text-gray-500 dark:text-gray-300">
                            <tr>
                                <th class="py-2">Title</th>
                                <th class="py-2">Date</th>
                                <th class="py-2">BY</th>
                                <th class="py-2">Status</th>
                                <th class="py-2">Action</th>
                            </tr>
                            
                        </thead>
                        <tbody class="text-gray-800 dark:text-gray-100">
                            @forelse($listOfReport as $value)
                            <tr class="border-b">
                                <td class="py-2">{{$value->title}}</td>
                                <td class="py-2">{{$value->created_at}}</td>
                                <td class="py-2">{{$value->reported_by}}</td>
                                <td class="py-2">
                                    <span class="inline-block bg-green-100 text-green-700 text-xs font-medium px-2 py-1 rounded-full">{{$value->status}}</span>
                                </td>
                                <td class="py-2">
                                    <a href="#" class="text-blue-600 hover:underline">View</a>
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

                <!-- Filter Panel -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-md shadow">
                    <h5 class="text-base font-medium text-gray-700 dark:text-gray-200 mb-4">🔍 Quick Filter</h5>
                    <form action="{{route('dashboard')}}" method="GET" enctype="multipart/form-data">
                        <label class="text-sm text-gray-500 dark:text-gray-300">Type</label>
                        <select class="w-full mb-4 mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded text-sm" name="type" id="type">
                            <option>All Types</option>
                            <option>Report</option>
                            <option>Invoice</option>
                            <option>Ledger</option>
                        </select>
                        <label class="text-sm text-gray-500 dark:text-gray-300">Start Date</label>
                        <input type="date" name="start_date" id="startDate" class="w-full mb-4 mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded text-sm"  required>

                        <label class="text-sm text-gray-500 dark:text-gray-300">End Date</label>
                        <input type="date" name="end_date" id="endDate" class="w-full mb-4 mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded text-sm"  required>


                        <button type="submit" class="w-full bg-gray-800 text-white text-sm py-2 rounded hover:bg-gray-700 transition">Apply</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
