<x-student-layout>
    @push('style')
        <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    @endpush
    <x-slot name="title">
        {{ $course->name }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-4 py-8 xl:py-20 xl:mx-auto grid grid-cols-1 md:grid-cols-5 gap-4 lg:gap-8">
            <div class="col-span-2">
                <span
                    class="bg-{{ $course->color }}-100 text-{{ $course->color }}-800 text-xs font-medium inline-flex items-center px-4 py-1 rounded dark:bg-gray-700 dark:text-{{ $course->color }}-400 border border-{{ $course->color }}-400 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    {{ $course->category }}
                </span>
                <h2 class="pt-2 md:pt-4 text-lg md:text-xl font-semibold tracking-wider uppercase text-gray-900 dark:text-white">
                    {{ $course->name }}
                </h2>
                <div class="hidden md:block">
                    <div class="mt-2 flex flex-col">
                        @foreach ($course->contents as $lesson)
                            <a href="{{ route('course.view', [$course->slug, $lesson->slug]) }}">
                                <div
                                    class="flex shadow-md p-4 mt-4 tracking-wider rounded-lg border border-gray-200 text-gray-500 {{ request()->is('course/' . $course->slug . '/' . $lesson->slug) ? 'bg-' . $course->color . '-100 text-' . $course->color . '-800 border border-' . $course->color . '-400 shadow-lg' : 'hover:shadow-xl' }}">
                                    <div>{{ $loop->iteration }}.</div>
                                    <div>&nbsp; {{ $lesson->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex flex-col lg:flex-row justify-start lg:justify-between items-start lg:items-center">
                    <div class="text-2xl font-light tracking-wider">{{ $content->title }}</div>
                    @if ($status == 1)
                        <button type="button" disabled=""
                            class="mt-5 text-{{ $course->color }}-900 bg-{{ $course->color }}-50 border border-{{ $course->color }}-300 focus:outline-none hover:bg-{{ $course->color }}-100 focus:ring-4 focus:ring-{{ $course->color }}-100 font-light tracking-wider rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                            Completed
                        </button>
                    @else
                        <a href="{{ route('lesson.complete', $content->id) }}"
                            class="mt-5 text-yellow-900 bg-yellow-50 border border-yellow-300 focus:outline-none hover:bg-yellow-100 focus:ring-4 focus:ring-yellow-100 font-light tracking-wider rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-yellow-800 dark:text-white dark:border-yellow-600 dark:hover:bg-yellow-700 dark:hover:border-yellow-600 dark:focus:ring-yellow-700 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            Mark as completed
                        </a>
                    @endif
                </div>
                <div>
                    <div class="mt-4">
                        @php
                            $image = '';
                            foreach ($content->images as $index => $image) {
                                if ($index >= 0) {
                                    break;
                                }
                                $image = $image;
                            }
                        @endphp
                        @if ($content->video)
                            <video id="my-video" class="video-js w-full h-[30vh] md:h-[50vh] rounded-lg" controls
                                preload="auto"
                                poster="test"
                                data-setup="{}">
                                <source
                                    src="test"
                                    type="video/mp4" />
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser
                                    that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        @endif
                    </div>
                </div>
                <div class="mt-8 tracking-wider font-light">
                    {!! $content->description !!}
                </div>
                <div class="gap-4 mt-8 sm:grid sm:grid-cols-4 sm:mt-12">
                    @foreach ($content->images as $image)
                        <img class="col-span-2 mb-4 sm:mb-0 rounded-lg"
                            src="test" alt="">
                    @endforeach
                </div>
            </div>
        </div>

        <!-- drawer init and toggle -->
        <div class="text-center hidden">
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe"
                data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]"
                aria-controls="drawer-swipe">
                Show swipeable drawer
            </button>
        </div>

        <!-- drawer component -->
        <div id="drawer-swipe"
            class="fixed md:hidden z-40 w-full overflow-y-auto bg-white border-t border-gray-200 rounded-t-lg dark:border-gray-700 dark:bg-gray-800 transition-transform bottom-0 left-0 right-0 translate-y-full bottom-[60px]"
            tabindex="-1" aria-labelledby="drawer-swipe-label">
            <div class="p-4 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 flex justify-center items-center"
                data-drawer-toggle="drawer-swipe">
                <h5 id="drawer-swipe-label"
                    class="inline-flex items-center text-base text-{{ $course->color }}-500 dark:text-{{ $course->color }}-400 font-medium">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10ZM17 13h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2Z" />
                    </svg>Select Lesson
                </h5>
            </div>
            <div class="grid grid-cols-3 gap-4 p-4 overflow-y-auto">
                @foreach ($course->contents as $lesson)
                    <a href="{{ route('course.view', [$course->slug, $lesson->slug]) }}">
                        <div
                            class="p-2 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 {{ request()->is('course/' . $course->slug . '/' . $lesson->slug) ? 'bg-' . $course->color . '-100 text-' . $course->color . '-800 border border-' . $course->color . '-400 shadow-lg' : '' }}">
                            <div class="font-medium text-center text-gray-500 dark:text-gray-400">
                                Lesson {{ $loop->iteration }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </x-slot>
    @push('script')
        <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
        <script></script>
    @endpush
</x-student-layout>
