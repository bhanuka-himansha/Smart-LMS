@props(['active' => false])
<a class="{{ $active ? 'text-white bg-blue-600 lg:bg-transparent lg:text-blue-800 lg:dark:text-blue-500 border-b lg:border-blue-800 py-2 lg:py-1 rounded lg:rounded-none' : 'py-2 text-gray-900 rounded-md hover:bg-gray-100 lg:hover:bg-blue-200 lg:hover:text-black dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 lg:bg-blue-50' }} block px-3 "
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
