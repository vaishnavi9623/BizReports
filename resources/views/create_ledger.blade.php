<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 leading-tight">
            📘 Create New Ledger
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md">
                <form action="#" method="POST" class="space-y-8">

                    {{-- 🏢 Party Details --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Party Name</label>
                            <input type="text" name="party_name" placeholder="XYZ Suppliers"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Account Type</label>
                            <select name="account_type"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                                <option value="">Select</option>
                                <option>Credit</option>
                                <option>Debit</option>
                            </select>
                        </div>
                    </div>

                    {{-- 💳 Transaction Info --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Transaction Date</label>
                            <input type="date" name="transaction_date"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Reference No.</label>
                            <input type="text" name="reference_no" placeholder="REF20250412"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                        </div>
                    </div>

                    {{-- 💰 Amounts --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Opening Balance</label>
                            <input type="text" value="₹10,000" disabled
                                class="w-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Transaction Amount</label>
                            <input type="text" name="amount" placeholder="₹1,500"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Closing Balance</label>
                            <input type="text" value="₹8,500" disabled
                                class="w-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                        </div>
                    </div>

                    {{-- 📝 Notes --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Remarks / Notes</label>
                        <textarea name="notes" rows="3" placeholder="Any transaction note or comment..."
                            class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm"></textarea>
                    </div>

                    {{-- ✅ Submit --}}
                    <div class="flex justify-between pt-6">
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-800 underline">← Back</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-2 rounded-lg transition duration-200">
                            Save Ledger
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
