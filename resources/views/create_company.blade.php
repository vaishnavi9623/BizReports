<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 leading-tight">
            Create New Company
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <form action="#" method="POST" class="space-y-6">
                    <!-- Company Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Name</label>
                        <input type="text" id="name" name="name" placeholder="e.g. Tech Solutions Ltd"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="description" name="description" rows="3" placeholder="Short summary about the company"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                        <input type="text" id="address" name="address" placeholder="e.g. 123 Main St, San Francisco, CA"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <!-- Owner Name -->
                    <div>
                        <label for="owner" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Owner Name</label>
                        <input type="text" id="owner" name="owner" placeholder="e.g. John Doe"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select id="status" name="status"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500">
                            <option selected disabled>Select Status</option>
                            <option>Completed</option>
                            <option>Pending</option>
                            <option>Failed</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white text-sm px-4 py-2 rounded-lg transition duration-200">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition duration-200">
                            Save Company
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
