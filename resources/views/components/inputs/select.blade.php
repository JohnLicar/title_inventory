@aware(['error'])
@props([
'options' => [],
'default',
'value',
'display',
])

<div class="relative">

    <select x-bind:id="$id('input')" {{ $attributes->class(
        ['block border p-3 w-full text-sm text-gray-900 bg-transparent rounded-lg appearance-none peer',
        'border' => !$error,
        'border-red-500 focus:ring-red-500' => $error,
        ]
        ) }}
        >
        <option value="">
            Select {{ $default }}
        </option>

        @foreach ($options as $option)
        <option value="{{ $option-> $value }}">
            {{ $option-> $display }}
        </option>
        @endforeach
    </select>


    <p {{ $attributes->class(['absolute px-2 text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2
        peer-focus:text-blue-600 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3
        peer-valid:text-xs',
        'text-gray-500' => !$error,
        'peer-focus:text-red-500 text-red-500' => $error])}}
        >
        Select {{ $default }}
    </p>
</div>