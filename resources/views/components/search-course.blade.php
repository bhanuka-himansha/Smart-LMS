<!-- Floating Button -->
<div class="fixed bottom-4 right-4 lg:hidden">
    <button id="searchButton" data-modal-target="searchModal" data-modal-toggle="searchModal"
        class="bg-primary-500 text-white p-4 rounded-full shadow-lg hover:bg-primary-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                clip-rule="evenodd" />
        </svg>
    </button>
</div>

<!-- Modal for Search on Smaller Devices -->
<div id="searchModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-40 justify-center items-center w-full md:inset-0 h-modal md:h-full lg:hidden">
    <div class="relative p-4 w-full max-w-md h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <div class="">Search Courses...</div>
            <button type="button"
                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="searchModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div x-data="searchComponent()">
                <div action="#" method="GET" class="mt-2">
                    <label for="modal-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="search" id="modal-search" autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search Courses..." x-model="query" @input="searchCourses">
                        <div x-show="showDropdown" @click.away="showDropdown = false"
                            class="absolute bg-white border border-gray-300 rounded-lg mt-1 w-full z-10">
                            <template x-if="results.length > 0">
                                <div class="p-2">
                                    <template x-for="result in results" :key="result.id">
                                        <a :href="routeUrl(result.slug)">
                                            <div
                                                class="p-2 hover:bg-gray-200 cursor-pointer border-b-2 border-gray-200">
                                                <div class="flex">
                                                    <div class="rounded-full h-12 w-12"
                                                        :style="{
                                                            background: `url('${window.AWS_CLOUDFRONT_URL}/${result.thumbnails}')`,
                                                            backgroundSize: 'cover',
                                                            backgroundPosition: 'center'
                                                        }">
                                                    </div>
                                                    <div class="px-2 text-left">
                                                        <div class="font-semibold" x-text="result.name"></div>
                                                        <div class="text-sm text-gray-600" x-text="result.category">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </template>
                                </div>
                            </template>
                            <template x-if="results.length === 0">
                                <div class="p-2" x-text="'No results for ' + query"></div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Normal Search Bar for Large Devices -->
<div x-data="searchComponent()">
    <form action="#" method="GET" class="hidden lg:block m-0">
        <label for="topbar-search" class="sr-only">Search</label>
        <div class="relative lg:w-96">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" name="search" id="topbar-search" autocomplete="off"
                class="bg-gray-50 mt-5 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Search Courses..." x-model="query" @input="searchCourses">
            <div x-show="showDropdown" @click.away="showDropdown = false"
                class="absolute bg-white border border-gray-300 rounded-lg mt-1 w-full z-10">
                <template x-if="results.length > 0">
                    <div class="p-2">
                        <template x-for="result in results" :key="result.id">
                            <a :href="routeUrl(result.slug)">
                                <div class="p-2 hover:bg-gray-200 cursor-pointer border-b-2 border-gray-200">
                                    <div class="flex">
                                        <div class="rounded-full h-12 w-12"
                                            :style="{
                                                background: `url('${window.AWS_CLOUDFRONT_URL}/${result.thumbnails}')`,
                                                backgroundSize: 'cover',
                                                backgroundPosition: 'center'
                                            }">
                                        </div>
                                        <div class="px-2">
                                            <div class="font-semibold" x-text="result.name"></div>
                                            <div class="text-sm text-gray-600" x-text="result.category"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </template>
                    </div>
                </template>
                <template x-if="results.length === 0">
                    <div class="p-2" x-text="'No results for ' + query"></div>
                </template>
            </div>
        </div>
    </form>
</div>

<script>
    window.AWS_CLOUDFRONT_URL = "{{ env('AWS_CLOUDFRONT_URL') }}";
    window.routeBaseUrl = "{{ route('course.view', ['course' => 'PLACEHOLDER']) }}".replace('PLACEHOLDER', '');

    function searchComponent() {
        return {
            query: '',
            results: [],
            showDropdown: false,
            searchCourses() {
                if (this.query.length > 0) {
                    fetch(`/api/search-courses?query=${this.query}`)
                        .then(response => response.json())
                        .then(data => {
                            this.results = data;
                            console.log(this.results);
                            this.showDropdown = true;
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                            this.results = [];
                            this.showDropdown = true;
                        });
                } else {
                    this.results = [];
                    this.showDropdown = false;
                }
            },
            routeUrl(slug) {
                return window.routeBaseUrl + slug;
            }
        }
    }
</script>
