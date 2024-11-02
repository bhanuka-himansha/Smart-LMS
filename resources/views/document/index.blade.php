<x-student-layout>
    @push('style')
    @endpush
    <x-slot name="title">
        Documents
    </x-slot>
    <x-slot name="content">
        <section class="relative py-24 bg-gray-900">
            <div class="w-full max-w-7xl mx-auto px-3 lg:px-8 overflow-x-auto">

                <div class="gap-8">
                    <div class="w-full">
                        <div class="flex items-center justify-between mb-7">
                            <div class="block">
                                <h4 class="text-3xl leading-snug font-semibold text-white ">Documents</h4>
                                <p class="text-base font-medium text-gray-400">Last Updated 2024.08.23</p>
                            </div>
                            <button
                                class="p-3 rounded-full border border-gray-300 text-white transition-all duration-300 hover:bg-white hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                    viewBox="0 0 21 20" fill="none">
                                    <path d="M10.9873 5V15M15.9873 10H5.9873" stroke="currentcolor" stroke-width="1.6"
                                        stroke-linecap="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 ">
                            <div class="rounded-xl border border-gray-700 bg-gray-800 p-2 flex items-center gap-4">
                                <div class="rounded-xl py-2 px-6 flex flex-col bg-gray-900">
                                    <h6 class="font-manrope text-2xl font-semibold leading-9 text-white">09</h6>
                                    <p class="text-base font-normal text-white">Feb</p>
                                </div>
                                <div class="block">
                                    <p class="text-base font-medium text-white">6209 Nikolaus Club, Tayaland 92911-1095
                                    </p>
                                    <p class="mt-1 text-sm font-normal text-gray-100">09:00 - 12:00, Monday, Feb 15</p>
                                </div>
                            </div>

                            <div
                                class="rounded-xl border border-gray-700 bg-gray-900 p-2 flex items-center gap-4 group transition-all duration-300 hover:bg-gray-800">
                                <div
                                    class="rounded-xl py-2 px-6 flex flex-col bg-gray-800 transition-all duration-300 group-hover:bg-gray-900">
                                    <h6 class="font-manrope text-2xl font-semibold leading-9 text-white">14</h6>
                                    <p class="text-base font-normal text-white">Feb</p>
                                </div>
                                <div class="block">
                                    <p class="text-base font-medium text-white">6209 Nikolaus Club, Tayaland 92911-1095
                                    </p>
                                    <p class="mt-1 text-sm font-normal text-gray-100">09:00 - 12:00, Monday, Feb 15</p>
                                </div>
                            </div>

                            <div
                                class="rounded-xl border border-gray-700 bg-gray-900 p-2 flex items-center gap-4 group transition-all duration-300 hover:bg-gray-800">
                                <div
                                    class="rounded-xl py-2 px-6 flex flex-col bg-gray-800 transition-all duration-300 group-hover:bg-gray-900">
                                    <h6 class="font-manrope text-2xl font-semibold leading-9 text-white">19</h6>
                                    <p class="text-base font-normal text-white">Feb</p>
                                </div>
                                <div class="block">
                                    <p class="text-base font-medium text-white">6209 Nikolaus Club, Tayaland 92911-1095
                                    </p>
                                    <p class="mt-1 text-sm font-normal text-gray-100">09:00 - 12:00, Monday, Feb 15</p>
                                </div>
                            </div>

                            <div
                                class="rounded-xl border border-gray-700 bg-gray-900 p-2 flex items-center gap-4 group transition-all duration-300 hover:bg-gray-800">
                                <div
                                    class="rounded-xl py-2 px-6 flex flex-col bg-gray-800 transition-all duration-300 group-hover:bg-gray-900">
                                    <h6 class="font-manrope text-2xl font-semibold leading-9 text-white">29</h6>
                                    <p class="text-base font-normal text-white">Feb</p>
                                </div>
                                <div class="block">
                                    <p class="text-base font-medium text-white">6209 Nikolaus Club, Tayaland 92911-1095
                                    </p>
                                    <p class="mt-1 text-sm font-normal text-gray-100">09:00 - 12:00, Monday, Feb 15</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </x-slot>
    @push('script')
    @endpush
</x-student-layout>
