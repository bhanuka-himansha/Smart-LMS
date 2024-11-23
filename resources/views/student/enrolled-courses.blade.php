<x-student-layout>
    @push('style')
    @endpush
    <x-slot name="title">
        My Courses
    </x-slot>
    <x-slot name="content">
        <div class="py-5 px-5 mx-auto max-w-screen-xl">
            <div class="mt-4 xl:mt-8">
                <button
                    class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                    role="alert">
                    <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">
                        @if ($courses->isEmpty())
                            Empty
                        @else
                            Dashboard
                        @endif
                    </span>
                    <span class="text-sm font-medium">
                        @if ($courses->isEmpty())
                            Get enrolled to new courses
                        @else
                            Get analytics of your courses
                        @endif
                    </span>
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <h1
                    class="my-2 lg:my-6 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl dark:text-white">
                    My Courses
                </h1>
            </div>
            @if (!$courses->isEmpty())
                <aside aria-label="Related articles" class="pb-8 lg:pb-20 pt-8 bg-white dark:bg-gray-900 antialiased">
                    <div class="">
                        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            @foreach ($courses as $course)
                                <article
                                    class="w-full lg:max-w-xs rounded-lg shadow p-4 border border-{{ $course->color }}-200 hover:bg-{{ $course->color }}-50">
                                    <div class="rounded-lg shadow-md h-56 lg:h-48 xl:h-40 w-full"
                                        style="background: url('{{ config('filesystems.disks.s3.url') . '/' . $course->thumbnails }}'); background-size: cover; background-position: center;">
                                    </div>
                                    <span
                                        class="mt-4 bg-{{ $course->color }}-100 text-{{ $course->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-{{ $course->color }}-400 border border-{{ $course->color }}-400 my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                        </svg>
                                        {{ $course->category }}
                                    </span>
                                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                                        <a href="#">{{ $course->name }}</a>
                                    </h2>
                                    <div class="text-sm text-gray-500">
                                        {!! Str::limit($course->description, 100) !!}
                                    </div>
                                    @if ($course->status == 1)
                                        <div class="flex justify-between items-center pt-4">
                                            <a href="{{ route('course.view', $course->slug) }}"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                Details
                                            </a>
                                            <a href="{{ route('course.view', [$course->slug, $course->contents[0]->slug]) }}"
                                                class="text-white bg-{{ $course->color }}-700 hover:bg-{{ $course->color }}-800 focus:outline-none focus:ring-4 focus:ring-{{ $course->color }}-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-{{ $course->color }}-600 dark:hover:bg-{{ $course->color }}-700 dark:focus:ring-blue-800 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                                </svg>
                                                Continue
                                            </a>
                                        </div>
                                    @else
                                        <div class="flex justify-center items-center pt-4">
                                            <button type="button" disabled=""
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 flex cursor-not-allowed">
                                                Unavailable
                                            </button>
                                        </div>
                                    @endif
                                </article>
                            @endforeach

                            @for ($i = 0; $i < $skeletons; $i++)
                                <div class="hidden md:block">
                                    <x-skeletons.card />
                                </div>
                            @endfor

                        </div>
                    </div>
                </aside>
            @endif
            @if ($courses->isEmpty())

                <div class="md:hidden mt-8">
                    <x-skeletons.card />
                </div>
                <div class="hidden md:block">
                    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @for ($i = 0; $i < 4; $i++)
                            <x-skeletons.card />
                        @endfor
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="flex mt-12 text-`md text-gray-400">
                        <p>You are not enrolled in any course yet.</p>
                        <a class="ml-1 text-blue-500" href="{{ route('courses.explore') }}">Explore now.</a>
                    </div>
                </div>
            @endif
        </div>
    </x-slot>
    @push('script')
    @endpush
</x-student-layout>
