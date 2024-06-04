@props([
'striped' => null
])

<tr @class([ 'odd:bg-gray-100 even:bg-white'=> $striped,
    ' whitespace-no-wrap text-sm leading-5 text-cool-gray-900 hover:bg-gray-50 bg-white border-b group'
    ])
    >
    {{ $slot }}
</tr>