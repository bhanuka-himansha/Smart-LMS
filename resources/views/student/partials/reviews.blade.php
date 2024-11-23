<div class="mx-auto max-w-7xl">
    <div class="flex justify-start items-center">
        <button
            class="inline-flex justify-between items-center py-1 px-1 pr-4 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
            role="alert">
            <span class="text-lg bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">
                Reviews & Ratings
            </span>
            <span class="text-sm font-medium flex justify-start items-center space-x-2">
                <x-star-rating :active="$course->rating()" />
                <span class="text-sm font-medium leading-none text-gray-900 hover:no-underline dark:text-white">
                    {{ $course->reviews->count() == 0 ? 'No Reviews' : $course->reviews->count() . Str::plural(' Review', $course->reviews->count()) }}
                </span>
            </span>
        </button>
    </div>

    <div class="grid grid-cols-1 gap-4 px-6 lg:px-4 lg:grid-cols-3 mt-8">
        <div class="w-full justify-items-center">
            <div class="shrink-0 space-y-4 mt-4">
                <p class="text-xl font-semibold leading-none text-gray-900 dark:text-white">
                    {{ $course->rating() }} out of 5 stars
                </p>
            </div>

            <div class="min-w-0 flex-1 space-y-3 mt-5">
                <div class="flex items-center gap-2">
                    <p class="w-2 shrink-0 text-start text-sm font-medium leading-none text-gray-900 dark:text-white">
                        5</p>
                    <svg class="h-4 w-4 shrink-0 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                    <div class="h-1.5 w-72 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-1.5 rounded-full bg-yellow-300"
                            style="width: {{ $course->reviews->count() > 0 ? ($course->reviews->where('rating', 5)->count() / $course->reviews->count()) * 100 : '0' }}%">
                        </div>
                    </div>
                    <a
                        class="w-8 shrink-0 text-right text-sm font-medium leading-none text-primary-700 dark:text-primary-500 sm:w-auto sm:text-left">
                        <span class="hidden sm:inline">
                            @php
                                $reviewCount = $course->reviews->where('rating', 5)->count();
                            @endphp

                            {{ $reviewCount == 0 ? 'No Reviews' : $reviewCount . ' ' . Str::plural('Review', $reviewCount) }}
                        </span>
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <p class="w-2 shrink-0 text-start text-sm font-medium leading-none text-gray-900 dark:text-white">
                        4</p>
                    <svg class="h-4 w-4 shrink-0 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                    <div class="h-1.5 w-72 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-1.5 rounded-full bg-yellow-300"
                            style="width: {{ $course->reviews->count() > 0 ? ($course->reviews->where('rating', 4)->count() / $course->reviews->count()) * 100 : '0' }}%">
                        </div>
                    </div>
                    <a
                        class="w-8 shrink-0 text-right text-sm font-medium leading-none text-primary-700 dark:text-primary-500 sm:w-auto sm:text-left">
                        <span class="hidden sm:inline">
                            @php
                                $reviewCount = $course->reviews->where('rating', 4)->count();
                            @endphp

                            {{ $reviewCount == 0 ? 'No Reviews' : $reviewCount . ' ' . Str::plural('Review', $reviewCount) }}
                        </span>
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <p class="w-2 shrink-0 text-start text-sm font-medium leading-none text-gray-900 dark:text-white">
                        3</p>
                    <svg class="h-4 w-4 shrink-0 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                    <div class="h-1.5 w-72 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-1.5 rounded-full bg-yellow-300"
                            style="width: {{ $course->reviews->count() > 0 ? ($course->reviews->where('rating', 3)->count() / $course->reviews->count()) * 100 : '0' }}%">
                        </div>
                    </div>
                    <a
                        class="w-8 shrink-0 text-right text-sm font-medium leading-none text-primary-700 dark:text-primary-500 sm:w-auto sm:text-left">
                        <span class="hidden sm:inline">
                            @php
                                $reviewCount = $course->reviews->where('rating', 3)->count();
                            @endphp

                            {{ $reviewCount == 0 ? 'No Reviews' : $reviewCount . ' ' . Str::plural('Review', $reviewCount) }}
                        </span>
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <p class="w-2 shrink-0 text-start text-sm font-medium leading-none text-gray-900 dark:text-white">
                        2</p>
                    <svg class="h-4 w-4 shrink-0 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                    <div class="h-1.5 w-72 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-1.5 rounded-full bg-yellow-300"
                            style="width: {{ $course->reviews->count() > 0 ? ($course->reviews->where('rating', 2)->count() / $course->reviews->count()) * 100 : '0' }}%">
                        </div>
                    </div>
                    <a
                        class="w-8 shrink-0 text-right text-sm font-medium leading-none text-primary-700 dark:text-primary-500 sm:w-auto sm:text-left">
                        <span class="hidden sm:inline">
                            @php
                                $reviewCount = $course->reviews->where('rating', 2)->count();
                            @endphp

                            {{ $reviewCount == 0 ? 'No Reviews' : $reviewCount . ' ' . Str::plural('Review', $reviewCount) }}
                        </span>
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <p class="w-2 shrink-0 text-start text-sm font-medium leading-none text-gray-900 dark:text-white">
                        1</p>
                    <svg class="h-4 w-4 shrink-0 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                    <div class="h-1.5 w-72 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-1.5 rounded-full bg-yellow-300"
                            style="width: {{ $course->reviews->count() > 0 ? ($course->reviews->where('rating', 1)->count() / $course->reviews->count()) * 100 : '0' }}%">
                        </div>
                    </div>
                    <a
                        class="w-8 shrink-0 text-right text-sm font-medium leading-none text-primary-700 dark:text-primary-500 sm:w-auto sm:text-left">
                        <span class="hidden sm:inline">
                            @php
                                $reviewCount = $course->reviews->where('rating', 1)->count();
                            @endphp

                            {{ $reviewCount == 0 ? 'No Reviews' : $reviewCount . ' ' . Str::plural('Review', $reviewCount) }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="lg:col-span-2 w-full lg:px-4">
            <form id="reviewForm" class="mb-6">
                @csrf
                <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
                <!-- Assuming you have a course ID available -->

                @if ($course->users->contains(Auth::user()))
                    @php
                        $review = $course->reviews->where('user_id', Auth::user()->id)->first();
                    @endphp

                    @if ($review)
                        <div>
                            <div class="flex justify-start items-center space-x-2 mb-5">
                                <p class="text-sm text-gray-700">You can only post one review per enrolled course.
                                </p>
                            </div>
                            <div
                                class="my-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                                <div class="py-2 px-4 bg-gray-50 rounded-t-lg dark:bg-gray-800">
                                    <label for="comment" class="sr-only">Your comment</label>
                                    <textarea id="comment" rows="4" name="review" readonly
                                        class="px-0 w-full text-sm text-gray-900 bg-gray-50 border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                        placeholder="{{ $review->review }}" required></textarea>
                                </div>
                                <div class="justify-between items-center py-2 px-3 border-t dark:border-gray-600">
                                    <p class="text-xs text-gray-700 text-right">on
                                        {{ $review->created_at->format('d - F - Y  H:i') }}</p>
                                    <div class="flex pl-0 space-x-1 sm:pl-2"></div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div>
                            <div class="flex space-x-1">
                                <input type="hidden" name="rating" id="rating-input" value="">
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-400 star" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="1">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-400 star" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="2">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-400 star" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="3">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-400 star" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="4">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-400 star" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="5">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div
                            class="my-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="py-2 px-4 bg-gray-50 rounded-t-lg dark:bg-gray-800">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" rows="6" name="review"
                                    class="px-0 w-full text-sm text-gray-900 bg-gray-50 border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Write a comment..." required></textarea>
                            </div>
                            <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
                                <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Post comment
                                </button>
                                <div class="flex pl-0 space-x-1 sm:pl-2"></div>
                            </div>
                        </div>
                    @endif
                @else
                    <div>
                        <div class="flex space-x-1">
                            <input type="hidden" name="rating" id="rating-input" value="">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="1">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="2">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="3">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="4">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-value="5">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div
                        class="my-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                        <div class="py-2 px-4 bg-gray-50 rounded-t-lg dark:bg-gray-800">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="6" name="review" disabled
                                class="px-0 w-full text-sm text-gray-900 bg-gray-50 border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Your are not enrolled to this couse yet" required></textarea>
                        </div>
                        <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
                            <button type="submit" disabled
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg">
                                Post comment
                            </button>
                            <div class="flex pl-0 space-x-1 sm:pl-2"></div>
                        </div>
                    </div>
                @endif
            </form>
        </div>

    </div>

    <div class="mt-6 divide-y divide-gray-200 dark:divide-gray-700 lg:px-4" id="reviews-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse ($reviews as $review)
                <x-review :review="$review" />
            @empty
                <div
                    class="flex justify-center items-center rounded-xl border-dashed border-2 border-gray-700 dark:border-gray-500">
                    <div class="text-center">
                        <p class="py-16 text-gray-800 dark:text-white">Be first to add a review</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

</div>
