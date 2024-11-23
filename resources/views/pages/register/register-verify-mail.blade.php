<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no made_by_sandev">
    <title>{{ env('APP_NAME') }} - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>

<style>
    @media (min-width: 1024px) {
        .d-flex-center {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }
    }
</style>

<body>
    <section class="py-8 bg-white dark:bg-gray-900 lg:py-0">
        <div class="lg:flex">
            <div class="hidden w-full max-w-md p-12 lg:h-screen lg:block bg-primary-600 d-flex-center">
                <div>
                    <div class="flex justify-center mb-2 space-x-4">
                        <a href="#" class="flex items-center text-2xl font-semibold text-white">
                            <img class="mr-1" src="assets/img/register/Logo.png" alt="logo-lms" />

                        </a>
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-primary-100 hover:text-white">
                            <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Go back
                        </a>
                    </div>
                    <div class="block p-8 text-white">
                        <div class="flex justify-center">
                            <h2 class="mb-1 text-3xl font-semibold">User Onboarding</h2>
                        </div>

                        <img class="mt-8 mx-auto lg:flex" src="assets/img/register/step-1.png" alt="step-1" />

                    </div>
                </div>
            </div>
            <div class="flex items-center mx-auto md:w-[42rem] px-4 md:px-8 xl:px-0">
                <div class="w-full">
                    <div class="flex items-center justify-center mb-8 space-x-4 lg:hidden">
                        <a href="#" class="flex items-center text-2xl font-semibold">
                            <img class="w-8 h-8 mr-2"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" />
                            <span class="text-gray-900 dark:text-white">Flowbite</span>
                        </a>
                    </div>
                    <ol
                        class="flex items-center mb-6 text-sm font-medium text-center text-gray-500 dark:text-gray-400 lg:mb-12 sm:text-base">
                        <li
                            class="flex items-center text-primary-600 dark:text-primary-500 sm:after:content-[''] after:w-12 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                            <div
                                class="flex items-center sm:block after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500">
                                <svg class="w-4 h-4 mr-2 sm:mb-2 sm:w-6 sm:h-6 sm:mx-auto shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Personal <span class="hidden sm:inline-flex">Info</span>
                            </div>
                        </li>
                        <li
                            class="flex items-center text-primary-600 dark:text-primary-500 after:content-[''] after:w-12 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                            <div
                                class="flex items-center sm:block after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500">
                                <svg class="w-4 h-4 mr-2 sm:mb-2 sm:w-6 sm:h-6 sm:mx-auto shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Account <span class="hidden sm:inline-flex">Info</span>
                            </div>
                        </li>
                        <li class="flex items-center sm:block">
                            <div class="mr-2 sm:mb-2 sm:mx-auto">3</div>
                            Confirmation
                        </li>
                    </ol>
                    <h1 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900 leding-tight dark:text-white">
                        Verify your email address</h1>
                    <p class="font-light text-gray-500 dark:text-gray-400 mb-4">We emailed you a six-digit code to <span
                            class="font-medium text-gray-900 dark:text-white">name@company.com</span>. Enter the code
                        below
                        to confirm your email address.</p>
                    <form action="#">

                        <p class="mb-4 text-sm text-gray-00 rounded-lg dark:text-gray-400 md:mb-6 dark:bg-gray-800">
                            Make sure to keep this window open while check your inbox.</p>
                        <div class="flex space-x-3">
                            <button type="submit"
                                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 sm:py-3.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Verify
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
