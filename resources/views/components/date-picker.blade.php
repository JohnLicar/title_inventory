@aware(['error'])

<input x-bind:id="$id('input')" {{ $attributes->class(
['block border p-3 w-full text-sm text-gray-900 bg-transparent rounded-lg appearance-none peer',
'border' => !$error,
'border-red-500 focus:ring-red-500' => $error,
]
) }}
placeholder=" " data-picker x-data x-ref="input" x-on:change="$dispatch('input', $el.value)"
x-init="new Pikaday({field: $refs.input, format: 'Y-MM-DD', yearRange: 200})" autocomplete="false"/>

@assets
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endassets