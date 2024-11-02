<x-student-layout>
    @push('style')
    @endpush
    <x-slot name="title">
        Dashboards
    </x-slot>
    <x-slot name="content">
        <div
            class="bg-white dark:bg-slate-900 grid grid-cols-1 md:grid-cols-4 max-w-7xl mx-auto pt-4 md:pt-8 xl:pt-12 pb-8 gap-8">
            <div class="col-span-2 flex flex-col">
                <div class="p-5">
                    <div
                        class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-900 md:text-3xl xl:text-4xl dark:text-white">
                        My Account
                    </div>
                    <div class="mt-10 flex flex-col bg-white border border-gray-200 py-4 px-12 rounded-lg shadow-md">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-4">
                            <div class="">
                                <img class="h-20 w-20 rounded-full shadow-md"
                                    src="{{ Gravatar::get(auth()->user()->email) }}" alt="">
                            </div>
                            <div class="sm:ml-10 md:ml-5 lg:ml-10 space-y-2 md:col-span-2">
                                <!-- Removed left margin on smaller screens -->
                                <div>
                                    <span
                                        class="text-xs text-blue-700 bg-blue-100 text-center rounded-lg py-1 px-2">{{ auth()->user()->department?->name ?? 'Welcome' }}</span>
                                </div>
                                <div class="pt-2">
                                    <p class="text-lg sm:text-xl font-semibold">{{ auth()->user()->name }}</p>
                                    <!-- Adjusted text size for smaller screens -->
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ auth()->user()->position ?? auth()->user()?->roles[0]?->name }}</p>
                                </div>
                                <div class="lg:hidden">
                                    <a href="{{ route('profile.edit') }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs sm:text-sm px-3 sm:px-5 py-1.5 text-center flex space-x-4 w-fit">
                                        <!-- Adjusted button size and font size for smaller screens -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 sm:w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        Edit profile
                                    </a>
                                </div>
                            </div>
                            <div
                                class="hidden lg:flex justify-center items-center col-span-3 mt-5 lg:col-span-1 text-center">
                                <a href="{{ route('profile.edit') }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs sm:text-sm px-3 sm:px-5 py-1.5 text-center flex space-x-4">
                                    <!-- Adjusted button size and font size for smaller screens -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 sm:w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5 lg:mt-8">
                    <div
                        class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-900 md:text-3xl xl:text-4xl dark:text-white">
                        Performance
                    </div>
                    <div class="mt-10 shadow-md p-4 rounded-lg border border-gray-200">
                        <div class="bg-gray-50 rounded-lg">
                            <div class="grid grid-cols-3 gap-2 p-3">
                                <div class="text-sm text-center bg-orange-50 text-orange-500 py-2 space-y-2 rounded-md">
                                    <span class="bg-orange-200 px-2 py-0.5 rounded-full">{{ $to_do }}</span>
                                    <div>To Do</div>
                                </div>
                                <div
                                    class="text-sm text-center bg-emerald-50 text-emerald-500 py-2 space-y-2 rounded-md">
                                    <span class="bg-emerald-200 px-2 py-0.5 rounded-full">{{ $in_progress }}</span>
                                    <div>In Progress</div>
                                </div>
                                <div class="text-sm text-center bg-blue-50 text-blue-500 py-2 space-y-2 rounded-md">
                                    <span class="bg-blue-200 px-2 py-0.5 rounded-full">{{ $completed }}</span>
                                    <div>Done</div>
                                </div>
                            </div>
                            <div class="w-full border-t border-t-gray-200 p-4 space-y-2">
                                <div class="text-sm text-gray-400 flex justify-between items-center">
                                    <div>Average course completion rate</div>
                                    <span
                                        class="bg-emerald-100 px-3 py-0.5 rounded-full text-emerald-700">{{ $completion_rate }}%</span>
                                </div>
                                <div class="text-sm text-gray-400 flex justify-between items-center">
                                    <div>Total completed courses</div>
                                    <span
                                        class="bg-blue-100 px-3 py-0.5 rounded-full text-blue-700">{{ $completed }}
                                        Courses</span>
                                </div>
                                <div class="text-sm text-gray-400 flex justify-between items-center">
                                    <div>Latest Course</div>
                                    <span
                                        class="bg-blue-100 px-3 py-0.5 rounded-full text-blue-700">{{ $latest_course?->name ?? 'No Records' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 lg:mt-8">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="px-5 lg:py-2">
                    <div class="flex justify-between items-center">
                        <div
                            class="text-xl font-bold tracking-tight leading-none text-gray-900 md:text-3xl xl:text-4xl dark:text-white">
                            My Progress
                        </div>
                        <a href="{{ route('courses.enrolled') }}"
                            class="ml-10 text-blue-500 text-md flex justify-center items-center">
                            View my courses
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                    <div class="mt-10 grid gap-8 grid-cols-1">
                        @forelse ($enrolled_courses as $enrolled_course)
                            <article
                                class="p-4 bg-{{ $enrolled_course->color }}-50 rounded-lg border border-{{ $enrolled_course->color }}-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                    <div class="rounded-lg shadow-md"
                                        style="background: url('{{ Storage::disk('s3')->temporaryUrl($enrolled_course->thumbnails, now()->addMinutes(5)) }}'); background-size: cover; background-position: center;">
                                    </div>
                                    <div class="col-span-2 w-full">
                                        <span
                                            class="bg-{{ $enrolled_course->color }}-100 text-{{ $enrolled_course->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-lg
                                    dark:bg-gray-700 dark:text-{{ $enrolled_course->color }}-400 border border-{{ $enrolled_course->color }}-400 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                            </svg>
                                            {{ $enrolled_course->category }}
                                        </span>
                                        <h2
                                            class="my-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{ $enrolled_course->name }}
                                        </h2>
                                        <div class="flex flex-col mt-4 space-y-6 justify-between items-center text-sm">
                                            @php
                                                $complete_count = 0;
                                                $progress = 0;
                                                $total_lessons = $enrolled_course->contents->count();
                                                $progress_lessons = App\Models\Progress::where(
                                                    'student_id',
                                                    auth()->user()->id,
                                                )
                                                    ->whereHas('content', function ($query) use ($enrolled_course) {
                                                        $query->where('course_id', $enrolled_course->id);
                                                    })
                                                    ->get();
                                                foreach ($progress_lessons as $progress_lesson) {
                                                    if ($progress_lesson->status == 1) {
                                                        $complete_count += 1;
                                                    }
                                                }
                                                if ($complete_count > 0 && $total_lessons > 0) {
                                                    $progress = ($complete_count / $total_lessons) * 100;
                                                }
                                            @endphp
                                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                <div class="bg-{{ $enrolled_course->color }}-600 h-2.5 rounded-full"
                                                    style="width: {{ $progress }}%"></div>
                                                <div class="mt-2">{{ $complete_count }} / {{ $total_lessons }}
                                                    lessons completed</div>
                                            </div>
                                            <div class="lg:flex w-full pt-4">
                                                <a href="{{ route('course.view', $enrolled_course->slug) }}"
                                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-1 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 flex justify-center items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                    </svg>
                                                    Details
                                                </a>
                                                @if (isset($enrolled_course->contents) && isset($enrolled_course->contents[0]) && $total_lessons > $complete_count)
                                                    <a href="{{ route('course.view', [$enrolled_course->slug, $enrolled_course?->contents[0]?->slug]) }}"
                                                        class="text-white bg-{{ $enrolled_course->color }}-700 hover:bg-{{ $enrolled_course->color }}-800 focus:outline-none focus:ring-4 focus:ring-{{ $enrolled_course->color }}-300 font-medium rounded-lg text-sm px-4 py-1 text-center me-2 mb-2 dark:bg-{{ $enrolled_course->color }}-600 dark:hover:bg-{{ $enrolled_course->color }}-700 dark:focus:ring-{{ $enrolled_course->color }}-800 flex justify-center items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-5 h-5 mr-1">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3" />
                                                        </svg>
                                                        Continue
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="flex flex-col justify-center items-center mt-5">
                                <img class="h-96 w-96 rounded-lg" src="{{ asset('assets/img/other/progress.gif') }}"
                                    alt="">
                                <div class="flex mt-12 text-`md text-gray-400">
                                    <p>No courses in progress.</p>
                                    <a class="ml-1 text-blue-500" href="{{ route('courses.explore') }}">Explore
                                        now.</a>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @if ($courses->count() > 0)
            <div>
                <section class="bg-white dark:bg-gray-900">
                    <div class="p-5 mx-auto max-w-screen-xl">
                        <div class="max-w-screen-sm mb-8">
                            <h2 class="mb-4 text-3xl tracking-tight font-semibold text-gray-600 dark:text-white">
                                Explore more courses available for you...
                            </h2>
                        </div>
                        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            @forelse ($courses as $course)
                                <article
                                    class="w:full lg:max-w-xs rounded-lg shadow p-4 border border-{{ $course->color }}-200">
                                    <div class="rounded-lg shadow-md size-40 w-full"
                                        style="background: url('{{ Storage::disk('s3')->temporaryUrl($course->thumbnails, now()->addMinutes(5)) }}'); background-size: cover; background-position: center;">
                                    </div>
                                    <span
                                        class="bg-{{ $course->color }}-100 text-{{ $course->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded
                            dark:bg-gray-700 dark:text-{{ $course->color }}-400 border border-{{ $course->color }}-400 my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                        </svg>
                                        {{ $course->category }}
                                    </span>
                                    <h2 class="mb-2 text-md font-bold leading-tight text-gray-900 dark:text-white">
                                        <a href="#">
                                            {!! Str::limit($course->name, 25) !!}
                                        </a>
                                    </h2>
                                    <div class="text-sm text-gray-500">
                                            {!! Str::limit($course->description, 150) !!}
                                    </div>
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
                                        @if ($course->type == 'Free')
                                            <a href="{{ route('student.enroll', $course->id) }}"
                                                class="text-white bg-{{ $course->color }}-700 hover:bg-{{ $course->color }}-800 focus:outline-none focus:ring-4 focus:ring-{{ $course->color }}-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-{{ $course->color }}-600 dark:hover:bg-{{ $course->color }}-700 dark:focus:ring-{{ $course->color }}-800 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                                </svg>
                                                Enroll Now
                                            </a>
                                        @endif
                                        @if ($course->type == 'Paid')
                                            <a id="paymentBtn" data-modal-target="paymentTypeModal"
                                                data-modal-toggle="paymentTypeModal" data-id="{{ $course->id }}"
                                                data-name="{{ $course->name }}" data-amount="{{ $course->amount }}"
                                                data-currency="{{ $course->currency }}"
                                                data-discount="{{ $course->discount }}"
                                                class="text-white bg-{{ $course->color }}-700 hover:bg-{{ $course->color }}-800 focus:outline-none focus:ring-4 focus:ring-{{ $course->color }}-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-{{ $course->color }}-600 dark:hover:bg-{{ $course->color }}-700 dark:focus:ring-{{ $course->color }}-800 flex cursor-pointer">
                                                {{ $course->currency }} {{ $course->amount }}
                                            </a>
                                        @endif
                                    </div>
                                </article>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </section>
            </div>
        @endif
    </x-slot>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [{{ $to_do }}, {{ $in_progress }}, {{ $completed }}],
                        backgroundColor: [
                            '#fdba74',
                            '#6ee7b7',
                            '#93c5fd',
                        ],
                    }],
                    labels: ['To Do', 'In Progress', 'Completed'],
                },
            });
        </script>
    @endpush
</x-student-layout>
