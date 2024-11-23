<section class="w-full p-6 bg-white rounded-lg shadow dark:bg-gray-800">
    <header>
        <h1 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
            {{ __('Update your personal details.') }}
        </h1>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Keep your profile information fresh and relevant here.') }}
        </p>
    </header>

    @if (session('status') === 'details-updated')
        <div id="alert-border-3"
            class="flex items-center p-4 my-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                Profile details updated successfully.
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <form method="post" action="{{ route('profile.details.update') }}">
        @csrf

        <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                    :value="old('first_name', $user->first_name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>
            <div>
                <x-input-label for="gender" :value="__('Gender')" />
                <x-select-field id="gender" name="gender" :value="old('gender', $user->gender)">
                    @if ($user->gender)
                        <option value="{{ $user->gender }}">{{ $user->gender == 'male' ? 'Male' : 'Female' }}</option>
                    @else
                        <option value="">Select your gender</option>
                    @endif
                    <option value="male" {{ $user->gender == 'male' ? 'hidden' : '' }}>Male</option>
                    <option value="female" {{ $user->gender == 'female' ? 'hidden' : '' }}>Female</option>
                </x-select-field>

                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            </div>
            <div>
                <x-input-label for="mobile" :value="__('Contact Number')" />
                <x-text-input id="mobile" name="mobile" type="number" class="mt-1 block w-full" :value="old('mobile', $user->mobile)"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
            </div>
            <div class="md:col-span-2">
                <x-input-label for="department_id" :value="__('Department')" />
                <x-select-field id="department_id " name="department_id " :value="old('department_id ', $user->department_id)">
                    @if ($departments)
                        @if ($user->department_id)
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ $user->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        @else
                            <option value="" selected>Please select your department </option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }} </option>
                            @endforeach
                        @endif
                    @endif
                </x-select-field>
                <x-input-error class="mt-2" :messages="$errors->get('department_id ')" />
            </div>
            <div class="md:col-span-2">
                <x-input-label for="position" :value="__('Position')" />
                <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" :value="old('position', $user->position)"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('position')" />
            </div>
        </div>

        <div class="flex items-center gap-4 mt-8">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                Update Profile
            </button>
        </div>
    </form>

</section>
