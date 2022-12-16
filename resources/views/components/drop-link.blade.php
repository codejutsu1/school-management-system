@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-2 px-4 text-gray-800 bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition duration-150 ease-in-out'
            : 'block py-2 px-4 hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
