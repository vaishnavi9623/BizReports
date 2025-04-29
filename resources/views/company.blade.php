<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 leading-tight">
            Companies Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Filter & Create Actions -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Filter Company</h3>
                </div>

                <!-- Filters Form -->
                <form class="flex flex-wrap items-end gap-4" aria-label="Company Filters">
                    <!-- Search Input -->
                    <div class="flex flex-col">
                        <label for="search" class="text-sm text-gray-700 dark:text-gray-300 mb-1">Search by Title or User</label>
                        <input id="search" type="text" placeholder="e.g. Sales Company, John Doe"
                            class="border-gray-300 dark:border-gray-600 rounded-lg text-sm py-2 px-3 focus:ring-2 focus:ring-blue-500 w-60" />
                    </div>

                    <!-- Status Filter -->
                    <div class="flex flex-col">
                        <label for="status" class="text-sm text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select id="status"
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
                        <input id="start-date" type="date"
                            class="border-gray-300 dark:border-gray-600 rounded-lg text-sm py-2 px-3 focus:ring-2 focus:ring-blue-500 w-48" />
                    </div>

                    <div class="flex flex-col">
                        <label for="end-date" class="text-sm text-gray-700 dark:text-gray-300 mb-1">End Date</label>
                        <input id="end-date" type="date"
                            class="border-gray-300 dark:border-gray-600 rounded-lg text-sm py-2 px-3 focus:ring-2 focus:ring-blue-500 w-48" />
                    </div>

                    <!-- Apply Filters Button -->
                    <div class="flex flex-col">
                        <label class="text-sm text-transparent mb-1">.</label> <!-- Spacer -->
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded-lg flex items-center gap-2 transition duration-200">
                            <i class="fas fa-filter"></i><span>Apply Filters</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Company Actions and Table -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-x-auto p-4">
                <!-- Action Buttons -->
                <div class="flex justify-end mb-4">
                    <a href="{{route('openCompanyform')}}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded-md flex items-center space-x-2 transition duration-200 me-2">
                        <i class="fas fa-plus-circle me-1"></i><span>Create New Company</span>
                    </a>
                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white text-sm py-2 px-4 rounded-md flex items-center space-x-2 transition duration-200">
                        <i class="fas fa-file-export me-1"></i><span>Export Company</span>
                    </a>
                </div>

                <!-- Company Table -->
                <table class="min-w-full text-sm text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-left text-xs uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-3">Company Name</th>
                            <th class="px-6 py-3">Description</th>
                            <th class="px-6 py-3">Address</th>
                            <th class="px-6 py-3">Owner</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        <!-- Company 1 -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4">March Sales Company</td>
                            <td class="px-6 py-4">Top performer in Q1 sales region.</td>
                            <td class="px-6 py-4">New York, USA</td>
                            <td class="px-6 py-4">Vaishnavi B</td>
                            <td class="px-6 py-4 flex space-x-3">
                                <a href="#" class="hover:text-blue-600 flex items-center space-x-1 transition duration-150" title="View Company">
                                    <i class="fas fa-eye me-1"></i><span>View</span>
                                </a>
                                <a href="#" class="hover:text-gray-600 flex items-center space-x-1 transition duration-150" title="Print Company">
                                    <i class="fas fa-print me-1"></i><span>Print</span>
                                </a>
                                <a href="#" class="hover:text-indigo-600 flex items-center space-x-1 transition duration-150" title="Email Company">
                                    <i class="fas fa-envelope me-1"></i><span>Email</span>
                                </a>
                                <a href="#" class="hover:text-indigo-600 flex items-center space-x-1 transition duration-150 me-3" title="Email Report">
                                    <i class="fas fa-trash me-1"></i><span>Delete</span>
                                </a>
                            </td>
                        </tr>
                    
                        <!-- Company 2 -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4">Creative Tech Solutions</td>
                            <td class="px-6 py-4">Provides IT consulting and software development.</td>
                            <td class="px-6 py-4">London, UK</td>
                            <td class="px-6 py-4">Ravi Kumar</td>
                            <td class="px-6 py-4 flex space-x-3">
                                <a href="#" class="hover:text-blue-600 flex items-center space-x-1 transition duration-150" title="View Company">
                                    <i class="fas fa-eye me-1"></i><span>View</span>
                                </a>
                                <a href="#" class="hover:text-gray-600 flex items-center space-x-1 transition duration-150" title="Print Company">
                                    <i class="fas fa-print me-1"></i><span>Print</span>
                                </a>
                                <a href="#" class="hover:text-indigo-600 flex items-center space-x-1 transition duration-150" title="Email Company">
                                    <i class="fas fa-envelope me-1"></i><span>Email</span>
                                </a>
                                <a href="#" class="hover:text-indigo-600 flex items-center space-x-1 transition duration-150 me-3" title="Email Report">
                                    <i class="fas fa-trash me-1"></i><span>Delete</span>
                                </a>
                            </td>
                        </tr>
                    
                        <!-- Company 3 -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4">Eco Friendly Goods</td>
                            <td class="px-6 py-4">Distributes eco-conscious household products.</td>
                            <td class="px-6 py-4">Berlin, Germany</td>
                            <td class="px-6 py-4">Amelia White</td>
                            <td class="px-6 py-4 flex space-x-3">
                                <a href="#" class="hover:text-blue-600 flex items-center space-x-1 transition duration-150" title="View Company">
                                    <i class="fas fa-eye me-1"></i><span>View</span>
                                </a>
                                <a href="#" class="hover:text-gray-600 flex items-center space-x-1 transition duration-150" title="Print Company">
                                    <i class="fas fa-print me-1"></i><span>Print</span>
                                </a>
                                <a href="#" class="hover:text-indigo-600 flex items-center space-x-1 transition duration-150" title="Email Company">
                                    <i class="fas fa-envelope me-1"></i><span>Email</span>
                                </a>
                                <a href="#" class="hover:text-indigo-600 flex items-center space-x-1 transition duration-150 me-3" title="Email Report">
                                    <i class="fas fa-trash me-1"></i><span>Delete</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
