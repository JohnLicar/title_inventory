@aware(['error'])
@props([
'error' => null,
'name',
])

<input x-bind:id="$id('input')" {{ $attributes->class(
['block border p-3 w-full text-sm text-gray-900 bg-transparent rounded-lg appearance-none peer',
'border' => !$error,
'border-red-500 focus:ring-red-500' => $error,
]
) }} placeholder=" "/>