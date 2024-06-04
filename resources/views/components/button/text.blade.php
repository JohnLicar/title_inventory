@props([
'btnType' => 'default',
'isLink' => false
])


@php
switch ($btnType) {

case 'success':
$class = 'disabled:bg-transparent disabled:text-gray-400 disabled:cursor-not-allowed disabled:hover:bg-transparent
text-green-600 active:bg-green-900/[.20] hover:text-green-500 hover:bg-green-700/[.20] normal-case';
break;

case 'error':
$class = 'disabled:bg-transparent disabled:text-gray-400 disabled:cursor-not-allowed disabled:hover:bg-transparent
text-red-600 active:bg-red-900/[.20] hover:text-red-500 hover:bg-red-700/[.20] normal-case';
break;

case 'warning':
$class = 'disabled:bg-transparent disabled:text-gray-400 disabled:cursor-not-allowed disabled:hover:bg-transparent
text-orange-600 active:bg-orange-900/[.20] hover:text-orange-500 hover:bg-orange-700/[.20] normal-case';
break;

case 'primary':
$class = 'disabled:bg-transparent disabled:text-gray-400 disabled:cursor-not-allowed disabled:hover:bg-transparent
text-teal-500 active:bg-teal-900/[.20] hover:text-teal-500 hover:bg-teal-700/[.20] normal-case';
break;

case 'secondary':
$class = 'disabled:bg-transparent disabled:text-gray-400 disabled:cursor-not-allowed disabled:hover:bg-transparent
text-gray-500 active:bg-gray-900/[.20] hover:text-gray-500 hover:bg-gray-700/[.20]';
break;

case 'info':
$class = 'disabled:bg-transparent disabled:text-gray-400 disabled:cursor-not-allowed disabled:hover:bg-transparent
text-orange-500 active:bg-gray-900/[.20] hover:text-orange-500 hover:bg-orange-700/[.20]';
break;

default:
$class = 'disabled:bg-transparent disabled:text-gray-400 disabled:cursor-not-allowed disabled:hover:bg-transparent
text-blue-600 active:bg-blue-900/[.20] hover:text-blue-500 hover:bg-blue-700/[.20]';
break;
}
@endphp

@if ($isLink)
<a {{$attributes->merge(['class' => 'whitespace-nowrap px-4 py-2 text-sm font-medium leading-5
    text-center transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:ring-0
    '.$class.''])}}>
    {{ $slot }}
</a>
@else
<button {{$attributes->merge(['class' => 'whitespace-nowrap px-4 py-2 text-sm font-medium leading-5
    text-center transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:ring-0
    '.$class.''])}}>
    {{ $slot }}
</button>
@endif