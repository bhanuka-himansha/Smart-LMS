<footer class="p-4 py-8 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl text-center">
        <div class="grid lg:grid-cols-3">
            <a href="#" class="flex items-center mb-4 text-2xl font-semibold text-gray-900 lg:mb-0 dark:text-white">
                <img src="{{ asset('assets/img/company/esh_white.svg') }}" class="mr-3 h-20"
                    alt="Enterprise Skill Hub Logo" />
            </a>
            <form action="#" class="flex w-full max-w-sm lg:ml-auto">
            </form>
            <ul class="flex flex-wrap items-center mb-4 text-sm text-gray-500 lg:mb-0 dark:text-gray-400">
                <li>
                    <a href="{{ route('student.dashboard') }}" class="mr-4 hover:underline md:mr-6 ">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('courses.enrolled') }}" class="mr-4 hover:underline md:mr-6">My Courses</a>
                </li>
                <li>
                    <a href="{{ route('courses.explore') }}" class="mr-4 hover:underline md:mr-6">Explore Courses</a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="hover:underline">My Profile</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
        <div class="sm:items-center sm:justify-between sm:flex">
            <span class="block text-sm text-gray-500 dark:text-gray-400">© {{ now()->format('Y') }}
                <a href="/" class="hover:underline">{{ env('APP_NAME') }}</a>.
                All Rights Reserved.</a>
            </span>
            <div class="flex justify-center mt-4 space-x-6 sm:mt-0">
                <span class="flex justify-center items-center text-sm text-gray-500 dark:text-gray-400">
                    Carefully handcrafted with&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 love-heart text-black dark:text-white" viewBox="0 0 24 24"><path fill="currentColor" d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812T2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412t-2.625 2.963T13.45 19.7z"/></svg>
                    &nbsp;&nbsp;by <a href="https://zuse.lk/" target="blank" class="hover:underline">&nbsp;Zuse Technologies</a>.
                </span>
            </div>
        </div>
    </div>
</footer>
