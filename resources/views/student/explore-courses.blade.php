<x-student-layout>
    @push('style')
        <style>
            /* Additional styles for better mobile viewing */
            @media (max-width: 640px) {
                .article-grid {
                    grid-template-columns: repeat(1, 1fr);
                }

                .max-w-xs {
                    max-width: 100%;
                }

                .p-4 {
                    padding: 1rem;
                }
            }
        </style>
    @endpush
    <x-slot name="title">
        Explore Courses
    </x-slot>
    <x-slot name="content">
        <div class="py-5 px-5 md:px-5 mx-auto max-w-screen-xl">
            <div class="mt-8">
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
                            No courses available at the moment
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
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl dark:text-white">
                    Explore Courses
                </h1>
            </div>
            @if ($courses->count() > 0)
                <aside aria-label="Related articles"
                    class="py-4 md:py-8 lg:pb-20 bg-white dark:bg-gray-900 antialiased">
                    <div class="">
                        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            @foreach ($courses as $course)
                                <article
                                    class="w-full lg:max-w-xs rounded-lg shadow p-4 border border-{{ $course->color }}-200 hover:bg-{{ $course->color }}-50">
                                    <div class="rounded-lg shadow-md h-56 lg:h-48 xl:h-40 w-full"
                                        style="background: url('test'); background-size: cover; background-position: center;">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
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
                            @endforeach
                            @for ($i = 0; $i < $skeletons; $i++)
                                <x-skeletons.card />
                            @endfor
                        </div>
                    </div>
                </aside>
            @endif
            @if ($courses->isEmpty())
                <div class="md:hidden">
                    <x-skeletons.card />
                </div>
                <div class="hidden md:block">
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        @for ($i = 0; $i < 4; $i++)
                            <x-skeletons.card />
                        @endfor
                    </div>
                </div>

                <div class="lg:flex lg:flex-col justify-center items-center">
                    <div class="lg:flex mt-12 text-md text-gray-400 text-center">
                        <p>No available courses at the moment, please contact site admins for more info. Meanwhile
                            checkout </p>
                        <a class="ml-1 text-blue-500 hover:text-blue-700" href="{{ route('courses.explore') }}">Enrolled Courses.</a>
                    </div>
                </div>
            @endif
        </div>

        <div id="paymentTypeModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                        <div>
                            <h3 class="text-xl uppercase">Select Payment Method</h3>
                        </div>
                        <div>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="paymentTypeModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4 mt-4 rounded-lg border border-gray-100 bg-gray-50 p-4 sm:mb-5 sm:mt-5">

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Course</dt>
                                    <dd id="courseName" class="text-base font-medium text-gray-900 dark:text-white">
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Amount</dt>
                                    <dd id="courseFee" class="text-base font-medium text-gray-900 dark:text-white">LKR
                                        1099</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Discount</dt>
                                    <dd id="discount" class="text-base font-medium text-green-500">LKR 0.00</dd>
                                </dl>
                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 text-lg font-bold text-gray-900 dark:border-gray-600 dark:text-white">
                                <dt>Total</dt>
                                <dd id="total"></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 mt-4 gap-4">
                        <div onclick="checkout('stripe')"
                            class="rounded-lg border border-gray-200 bg-transparent p-2 flex justify-center items-center cursor-pointer">
                            <img src="{{ asset('assets/img/pg/stripe.png') }}" class="h-6 rounded-lg"
                                alt="">
                        </div>
                        <div onclick="checkout('paypal')"
                            class="rounded-lg border border-gray-200 bg-transparent p-2 flex justify-center items-center cursor-pointer">
                            <img src="{{ asset('assets/img/pg/paypal.png') }}" class="h-5 rounded-lg"
                                alt="">
                        </div>
                        <div onclick="checkout('genie')"
                            class="rounded-lg border border-gray-200 bg-transparent p-2 flex justify-center items-center cursor-pointer">
                            <img src="{{ asset('assets/img/pg/genie.png') }}" class="h-7 rounded-lg" alt="">
                        </div>
                        <div onclick="checkout('apple-pay')"
                            class="rounded-lg border border-gray-200 bg-transparent p-2 flex justify-center items-center cursor-pointer">
                            <img src="{{ asset('assets/img/pg/apple_pay.png') }}" class="h-5 rounded-lg"
                                alt="">
                        </div>
                        <div onclick="checkout('payhere')"
                            class="col-span-4 rounded-lg flex justify-center items-center cursor-pointer">
                            <img src="{{ asset('assets/img/pg/payhere.png') }}" class="h-12 rounded-lg"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Checkout Form -->
        <form id="payment-initiate" action="{{ route('payment.initiate') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="">
            <input type="hidden" name="gateway" value="">
        </form>
    </x-slot>
    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function checkout(gateway) {
                $('input[name="gateway"]').val(gateway);
                document.getElementById('payment-initiate').submit();
            }

            $('#paymentBtn').click(function() {
                var course_id = $(this).data('id');
                var course_name = $(this).data('name');
                var course_fee = $(this).data('amount');
                var currency = $(this).data('currency');
                var discount = $(this).data('discount');

                $('#courseName').empty();
                $('#courseName').html(course_name);

                $('#courseFee').empty();
                $('#courseFee').append(`${currency} ${course_fee}`);

                $('#discount').empty();
                $('#discount').append(`${currency} ${discount}`);

                var total = course_fee - discount;
                $('#total').empty();
                $('#total').append(`${currency} ${total.toFixed(2)}`);

                $('input[name="course_id"]').val(course_id);
            });
        </script>
    @endpush
</x-student-layout>
