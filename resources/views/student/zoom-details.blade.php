<x-student-layout>
    @push('style')
    @endpush
    <x-slot name="title">
        Zoom Meeting Details
    </x-slot>
    <x-slot name="content">
        <div class="grid gap-8 px-5 m-10 mx-auto md:px-8 max-w-7xl lg:grid-cols-1 lg:gap-16 xl:gap-24">
            <div class="grid grid-cols-1 gap-8 mt-4 lg:grid-cols-2">
                <div>
                    <h2 class="mb-4 text-2xl font-bold">{{ $course->name }} - Zoom Meetings</h2>
                    <ul>
                        @foreach ($zoom_meetings as $meeting)
                            <li class="mb-2">
                                <button data-title="{{ $meeting->zoom_meeting_title }}" type="button" class="text-gray-900 w-72 zoom-meeting-button bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-800 dark:bg-white dark:border-gray-700 dark:text-gray-900 dark:hover:bg-gray-200 me-2 mb-2">
                                    <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M1.984 7.506v6.74c.006 1.524 1.361 2.75 3.014 2.745h10.693c.303 0 .549-.225.549-.498v-6.74c-.008-1.523-1.363-2.75-3.014-2.744H2.531c-.302 0-.547.224-.547.497m14.936 2.63l4.416-2.963c.383-.292.68-.219.68.309v9.036c0 .601-.363.528-.68.3q\9L16.92 13.87z"/></svg>
                                    {{ $meeting->zoom_meeting_title }}
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                                    </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div id="meeting-details" class="hidden lg:block">
                    <!-- Placeholder for meeting details to be displayed -->
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.zoom-meeting-button');
                const meetingDetails = document.getElementById('meeting-details');

                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        const title = this.getAttribute('data-title');
                        // Fetch meeting details based on title
                        const meeting = findMeetingByTitle(title);

                        // Update meeting details section
                        if (meeting) {
                            meetingDetails.innerHTML = `

                                  <div class="mt-6 grow sm:mt-8 lg:mt-0">
                        <div
                            class="p-6 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">${meeting.zoom_meeting_title}  (Meeting Details)</h3>

                            <ol class="relative border-gray-200 ms-3 border-s dark:border-gray-700">
                                <li class="mb-10 ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M14.217 3.5a5.17 5.17 0 0 0-4.434 0L3.092 6.637c-1.456.682-1.456 3.044 0 3.726l6.69 3.137a5.17 5.17 0 0 0 4.435 0l6.691-3.137c1.456-.682 1.456-3.044 0-3.726zM22 8.5v5"/><path d="M5 11.5v5.125C5 19.543 9.694 21 12 21s7-1.457 7-4.375V11.5"/></g></svg>
                                    </span>
                                    <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Meeting ID</h4>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">${meeting.zoom_meeting_id}</p>
                                </li>

                                <li class="mb-10 ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M14.217 3.5a5.17 5.17 0 0 0-4.434 0L3.092 6.637c-1.456.682-1.456 3.044 0 3.726l6.69 3.137a5.17 5.17 0 0 0 4.435 0l6.691-3.137c1.456-.682 1.456-3.044 0-3.726zM22 8.5v5"/><path d="M5 11.5v5.125C5 19.543 9.694 21 12 21s7-1.457 7-4.375V11.5"/></g></svg>
                                    </span>
                                    <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Password</h4>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">${meeting.zoom_meeting_password}</p>
                                </li>
                                <li class="mb-10 ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M14.217 3.5a5.17 5.17 0 0 0-4.434 0L3.092 6.637c-1.456.682-1.456 3.044 0 3.726l6.69 3.137a5.17 5.17 0 0 0 4.435 0l6.691-3.137c1.456-.682 1.456-3.044 0-3.726zM22 8.5v5"/><path d="M5 11.5v5.125C5 19.543 9.694 21 12 21s7-1.457 7-4.375V11.5"/></g></svg>
                                    </span>
                                    <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Start Time</h4>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400"> ${new Date(meeting.start_time).toLocaleString()}</p>
                                </li>
                            </ol>

                            <div class="gap-4 sm:flex sm:items-center">

                                <a href="${meeting.zoom_meeting_url}" target="_blank"
                                    class="mt-4 flex w-full items-center justify-center rounded-lg bg-primary-700  px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300  dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0">Join Meeting</a>
                            </div>
                        </div>
                    </div>



                            `;
                            meetingDetails.classList.remove('hidden');
                        }
                    });
                });

                // function to find meeting details by title
                function findMeetingByTitle(title) {
                    return @json($zoom_meetings->toArray()).find(meeting => meeting.zoom_meeting_title === title);
                }
            });
        </script>

    </x-slot>
</x-student-layout>
