<x-student-layout>
    @push('style')
    @endpush
    <x-slot name="title">
        {{ $course->name }}
    </x-slot>
    <x-slot name="content">
        <div class="grid gap-8 px-5 m-10 mx-auto md:px-8 max-w-7xl lg:grid-cols-2 lg:gap-16 xl:gap-24">
            <!--Course Thumbnail-->
            <div
                class="flex flex-col items-START justify-start w-full overflow-hidden rounded-lg max-h-52 md:max-h-80 lg:max-h-96">
                <a href="{{ route('courses.enrolled') }}"
                    class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                    role="alert">
                    <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">
                        Go Back
                    </span>
                    <span class="text-sm font-medium">
                        View all enrolled courses
                    </span>
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <img class="object-cover w-full h-full rounded-lg"
                    src="test"
                    alt="">
            </div>

            <!--Course Details Section-->
            <div>
                <span
                    class="bg-{{ $course->color }}-100 text-{{ $course->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded
                dark:bg-gray-700 dark:text-{{ $course->color }}-400 border border-{{ $course->color }}-400 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    {{ $course->category }}
                </span>
                <h2 class="my-2 text-xl font-semibold tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    {{ $course->name }}
                </h2>
                <div class="mt-2 flex items-center gap-2">
                    <x-star-rating :active="$course->rating()" />
                    <span
                        class="text-sm font-medium leading-none text-gray-900 hover:no-underline dark:text-white">
                        {{ $course->reviews->count() == 0 ? 'No Reviews' : $course->reviews->count() . Str::plural(' Review', $course->reviews->count()) }}
                    </span>
                </div>
                <div class="mt-4 text-gray-600 text-md text-justify">
                    <span>
                        {!! $course->description !!}

                    </span>
                </div>
                <div class="flex mt-6">
                    @if (Auth::check() && $enrolled == 1)
                        @if ($completed == 1)
                            <button type="button" id="download"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                </svg>
                                Download Certificate
                            </button>
                        @else
                            <a href="{{ route('course.view', [$course->slug, $course->contents[0]->slug]) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3" />
                                </svg>
                                Continue the Course
                            </a>
                        @endif
                    @endif
                </div>
            </div>

            <!--Course Contents Section-->
            <div>
                <div class="text-2xl font-semibold">Course Contents</div>
                <div class="flex flex-col mt-2 lg:mt-6">
                    @foreach ($course->contents as $lesson)
                        <a href="{{ route('course.view', [$course->slug, $lesson->slug]) }}">
                            <div class="flex p-4 mt-4 text-gray-500 border border-gray-200 shadow-md hover:shadow-lg">
                                <div>{{ $loop->iteration }}.</div>
                                <div>&nbsp; {{ $lesson->title }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!--Objectives Section-->
            <div>
                <div class="text-2xl font-semibold">Learning Objectives</div>
                <div class="mt-4 lg:mt-8">
                    <ul role="list" class="my-6 space-y-4 lg:mb-0">
                        <div class="grid gap-4 mt-6 lg:grid-cols-2">
                            @foreach ($course->objectives as $objective)
                                <li class="flex space-x-2.5">
                                    <svg class="flex-shrink-0 w-5 h-5 text-{{ $course->color }}-600 dark:text-{{ $course->color }}-500"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span
                                        class="leading-tight text-gray-500 dark:text-gray-400">{{ $objective['fields']['name'] }}</span>
                                </li>
                            @endforeach
                        </div>
                    </ul>
                </div>


                @if ($zoom_meetings->isEmpty())
                    {{-- <p>No Zoom meetings scheduled.</p> --}}
                @else
                    <button type="button"
                        class="mt-8 text-white bg-[#2D8CFF] hover:bg-[#247ee5]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2"
                        onclick="window.location.href='{{ route('course.zoom-details', ['courseSlug' => $course->slug]) }}'">
                        <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M1.984 7.506v6.74c.006 1.524 1.361 2.75 3.014 2.745h10.693c.303 0 .549-.225.549-.498v-6.74c-.008-1.523-1.363-2.75-3.014-2.744H2.531c-.302 0-.547.224-.547.497m14.936 2.63l4.416-2.963c.383-.292.68-.219.68.309v9.036c0 .601-.363.528-.68.3q\9L16.92 13.87z" />
                        </svg>
                        Zoom Meeting Available
                    </button>
                    <ul>
                        {{-- @foreach ($zoom_meetings as $meeting)
                            <li>
                                <strong>{{ $meeting->zoom_meeting_title }}</strong><br>
                                <a href="{{ $meeting->zoom_meeting_url }}" target="_blank">Join Meeting</a><br>
                                Meeting ID: {{ $meeting->zoom_meeting_id }}<br>
                                Password: {{ $meeting->zoom_meeting_password }}<br>
                                Start Time: {{ $meeting->start_time }}
                            </li>
                        @endforeach --}}
                    </ul>
                @endif
            </div>

            <!--Reviews & Ratings Section-->
            <div id="reviews-container" class="col-span-2">
                @include('student.partials.reviews', [
                    'reviews' => $course->reviews->sortByDesc('created_at'),
                ])
            </div>
        </div>


        @push('script')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const stars = document.querySelectorAll('.star');
                    const ratingInput = document.getElementById('rating-input');
                    let selectedRating = 0;
                    const courseId = {{ $course->id }}; // $course->id is passed to the view

                    stars.forEach(star => {
                        star.addEventListener('click', function() {
                            selectedRating = this.getAttribute('data-value');
                            ratingInput.value = selectedRating;
                            stars.forEach(s => {
                                if (s.getAttribute('data-value') <= selectedRating) {
                                    s.classList.remove('text-gray-400');
                                    s.classList.add('text-yellow-400');
                                } else {
                                    s.classList.remove('text-yellow-400');
                                    s.classList.add('text-gray-400');
                                }
                            });
                        });
                    });

                    document.getElementById('reviewForm').addEventListener('submit', function(e) {
                        e.preventDefault();
                        const review = document.getElementById('comment').value;

                        if (selectedRating === 0 || !review.trim()) {
                            alert('Please provide a rating and a review');
                            return;
                        }

                        fetch('{{ route('course.rating') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({
                                    review: review,
                                    rating: selectedRating,
                                    course_id: courseId
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // alert(data.success);
                                    // Optionally, reset the form and rating stars here
                                    document.getElementById('reviewForm').reset();
                                    stars.forEach(s => {
                                        s.classList.remove('text-yellow-400');
                                        s.classList.add('text-gray-400');
                                    });
                                    ratingInput.value = '';
                                    selectedRating = 0;

                                    $.ajax({
                                        url: '{{ route('reviews.fetch', $course->id) }}',
                                        type: 'GET',
                                        success: function(response) {
                                            $('#reviews-container').html(
                                                response);
                                        },
                                        error: function(xhr) {
                                            console.error(
                                                'Error fetching reviews:',
                                                xhr);
                                        }
                                    });

                                } else {
                                    alert('Failed to submit review');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while submitting the review');
                            });
                    });
                });
            </script>
        @endpush

    </x-slot>

</x-student-layout>
