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
                                <svg class="w-4 h-4 mr-2 sm:mb-2 sm:w-6 sm:h-6 sm:mx-auto" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Personal <span class="hidden sm:inline-flex">Info</span>
                            </div>
                        </li>
                        <li
                            class="flex items-center after:content-[''] after:w-12 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                            <div
                                class="flex items-center sm:block after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500">
                                <div class="mr-2 sm:mb-2 sm:mx-auto">2</div>
                                Account <span class="hidden sm:inline-flex">Info</span>
                            </div>
                        </li>
                        <li class="flex items-center sm:block">
                            <div class="mr-2 sm:mb-2 sm:mx-auto">3</div>
                            Confirmation
                        </li>
                    </ol>
                    <h1
                        class="mb-4 text-2xl font-extrabold tracking-tight text-gray-900 sm:mb-6 leding-tight dark:text-white">
                        Account details</h1>
                    <form action="#">
                        <div class="grid gap-5 my-6 sm:grid-cols-2">
                            <div class="mr-2">
                                <label for="full-name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                                    Name</label>
                                <input type="text" name="full-name" id="full-name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Bonnie" required="">
                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="name@company.com" required="">
                            </div>
                            <div class="mr-2">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required="">
                            </div>
                            <div>
                                <label for="confirm-password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                    password</label>
                                <input type="password" name="confirm-password" id="confirm-password"
                                    placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required="">
                            </div>
                            <div class="mr-2">
                                <label for="country"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                <select id="country"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="">Choose your country</option>
                                    <option value="USA">USA</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="CA">Canada</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                    <option value="ES">Spain</option>
                                    <option value="JP">Japan</option>
                                    <option value="AUS">Australia</option>
                                </select>
                            </div>
                            <div>
                                <label for="phone-number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                <input type="number" name="phone-number" id="phone-number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="+123 567 890" required="">
                            </div>
                        </div>
                        <div class="mb-6 space-y-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" aria-describedby="terms" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-light text-gray-500 dark:text-gray-300">By
                                        signing up,
                                        you are creating a Flowbite account, and you agree to Flowbite’s <a
                                            class="font-medium text-primary-600 dark:text-primary-500 hover:underline"
                                            href="#">Terms of Use</a> and <a
                                            class="font-medium text-primary-600 dark:text-primary-500 hover:underline"
                                            href="#">Privacy Policy</a>.</label>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="newsletter" aria-describedby="newsletter" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="newsletter" class="font-light text-gray-500 dark:text-gray-300">Email
                                        me
                                        about product updates and resources.</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <a href="#"
                                class="text-center items-center w-full py-2.5 sm:py-3.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Prev:
                                Personal Info</a>
                            <button type="submit"
                                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 sm:py-3.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Next:
                                Account Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
