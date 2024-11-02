<div
    class="w-full hover:bg-gray-50 rounded-lg m-2 lg:m-0 p-6 flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-4 {{ Auth::user()->id === $review->user->id ? 'bg-gray-50' : 'bg-white' }}">
    <div class="flex flex-col items-center md:items-start w-full md:w-28 lg:w-auto">
        <img class="w-24 h-24 rounded-full lg:mx-6 mx-auto" src="{{ Gravatar::get(auth()->user()->email) }}"
            alt="Profile Photo">
    </div>
    <div class="flex flex-col text-left w-full">
        <div
            class="text-lg font-semibold text-center md:text-left {{ Auth::user()->id === $review->user->id ? 'text-blue-700' : '' }}">
            {{ $review->user->name }} <span
                class="text-gray-500 text-sm">{{ $review->user->position ? '(' . $review->user->position . ')' : '' }}</span>
        </div>
        <div class="mt-5 md:mt-2">
            <x-star-rating :active="$review->rating . '.0'" />
        </div>
        <p class="mt-2 text-gray-700">{{ $review->review }}</p>
        <p class="text-xs text-gray-700 mt-2">{{ $review->created_at->format('d - F - Y  H:i') }}</p>
    </div>
</div>
