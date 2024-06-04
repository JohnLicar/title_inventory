@props([
'error' => null
])

<div class="relative" x-data x-id="['input']" {{ $attributes }}>
    {{ $slot }}
</div>

@if ($error)
<div class="text-sm text-red-500 !mt-1">
    {{ $error }}
</div>
@endif