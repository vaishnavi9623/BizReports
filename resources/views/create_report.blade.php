<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 leading-tight">
            📊 Create New Report
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md">
                <form action="{{route('report.save')}}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    {{-- 📁 Report Info --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Report Title</label>
                            <input type="text" name="report_title" id="report_title" placeholder="Monthly Sales Report"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm" name="title" id="title">
                                @error('report_title')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Report Type</label>
                            <select name="report_type" id="report_type"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                                <option value="">Select Type</option>
                                <option value="sales">Sales</option>
                                <option value="inventory">Inventory</option>
                                <option value="finance">Finance</option>
                                <option value="system">System</option>
                            </select>
                            @error('report_type')
                            <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Client Name</label>
                        <input type="text" name="clientname" id="clientname" placeholder="Monthly Sales Report"
                            class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm" name="clientname" id="clientname">
                            @error('clientname')
                            <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                            @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Client Address</label>
                        <textarea class="w-full rounded-lg text-sm py-2 px-4 border-gray-300 dark:border-gray-600"
                            rows="2" placeholder="YANTRIK ENGINEERS, Gat No – 319 -320 Pune Saswad Road..." name="clientaddress" id="clientaddress"></textarea>
                            @error('clientaddress')
                            <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                            @enderror
                        </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Job Name</label>
                            <input type="text" placeholder="18100 LTRS WC L.P.G Road Tanker"
                                class="w-full rounded-lg text-sm py-2 px-4 border-gray-300 dark:border-gray-600" name="jobname" id="jobname"/>
                                @error('jobname')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                            </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Job No.</label>
                            <input type="text" placeholder="YE-732"
                                class="w-full rounded-lg text-sm py-2 px-4 border-gray-300 dark:border-gray-600" name="jobno" id="jobno"/>
                                @error('jobno')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                            </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Report No.</label>
                            <input type="text" placeholder="BSS/RT/25-26/01"
                                class="w-full rounded-lg text-sm py-2 px-4 border-gray-300 dark:border-gray-600" name="reportno" id="reportno"/>
                                @error('reportno')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Date of RT</label>
                            <input type="date"
                                class="w-full rounded-lg text-sm py-2 px-4 border-gray-300 dark:border-gray-600" name="dateofrt" id="dateofrt" />
                                @error('dateofrt')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                            </div>
                    </div>

                    {{-- 📝 Description --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" rows="4" placeholder="Enter summary or important notes..."
                            class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm" name="description" id="description"></textarea>
                            @error('description')
                            <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                            @enderror
                        </div>

                    {{-- 📌 Status --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Report Status</label>
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
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Reported By</label>
                            <input type="text" name="reported_by" value="John Doe" id="reported_by"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-sm">
                                @error('reported_by')
                                <div class="text-danger fw-bold"><small>{{$message}}</small></div>
                                @enderror
                            </div>
                    </div>

                    {{-- 📎 Attachment --}}
                    {{-- <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Attach File (Optional)</label>
                        <input type="file" name="report_file"
                            class="mt-2 w-full text-sm text-gray-600 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div> --}}

                    {{-- ✅ Submit --}}
                    <div class="flex justify-between pt-6">
                        <a href="{{'reports'}}" class="text-sm text-gray-600 hover:text-gray-800 underline">← Back</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-2 rounded-lg transition duration-200">
                            Save Report
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
