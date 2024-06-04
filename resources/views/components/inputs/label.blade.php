@aware(['error'])
@props(['icon'=> null])

<label x-bind:for="$id('input')" {{ $attributes->class(
    ['flex items-center space-x-1 block absolute text-base border text-gray-500
    rounded-full border-none truncate md:whitespace-normal
    duration-300 transform
    -translate-y-5 scale-75 top-2 origin-[0] bg-white px-2 peer-focus:px-2
    peer-focus:text-blue-600
    peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2
    peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-5 left-1 ',
    'text-gray-500' => !$error,
    'peer-focus:text-red-500 text-red-500' => $error,
    ]
    ) }}>
    @if ($icon)
    <x-dynamic-component :component="'icon.'.$icon" />
    @endif
    {{ $slot }}
</label>