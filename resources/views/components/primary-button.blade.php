@props(['href' => null])

@php
$commonAttributes = $attributes->merge([
'class' => 'py-2 px-4 text-center bg-indigo-600 rounded-md text-white text-sm hover:bg-indigo-500 uppercase'
]);
@endphp

@if ($href)
<a href="{{ $href }}" {{ $commonAttributes }} wire:navigate>
    {{ $slot }}
</a>
@else
<button {{ $commonAttributes }}>
    {{ $slot }}
</button>
@endif