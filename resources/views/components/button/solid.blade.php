@props([
'isLink' => false,
'bg' => 'purple'
])



@if ($isLink)
<a {{ $attributes->merge(['class' => 'px-4 py-2 text-sm font-medium leading-5 text-center
    text-white transition-colors duration-150 bg-'.$bg.'-600 border border-transparent rounded-lg cursor-pointer
    active:bg-'.$bg.'-600
    hover:bg-'.$bg.'-700 focus:outline-none focus:ring']) }}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 text-sm font-medium leading-5
    text-white transition-colors duration-150 bg-'.$bg.'-600 border border-transparent rounded-lg
    active:bg-'.$bg.'-600
    hover:bg-'.$bg.'-700 focus:outline-none focus:ring']) }}>
    {{ $slot }}
</button>
@endif