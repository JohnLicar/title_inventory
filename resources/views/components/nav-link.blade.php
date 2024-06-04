@props(['active'])

@php
$classes = ($active ?? false)
? 'flex items-center mt-4 py-2 px-6 bg-indigo-500 bg-opacity-25 text-gray-100 hover:bg-indigo-600'
: 'flex items-center mt-4 py-2 px-6 text-gray-100 hover:bg-indigo-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $icon ?? '' }}
    <span class="mx-3">{{ $slot }}</span>
</a>