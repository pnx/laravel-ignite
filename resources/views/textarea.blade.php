@php
if ($errors->has($name)) {
    $border = 'border-red-400 focus:border-red-500 focus:ring-red-500';
} else {
    $border = 'border-gray-200 focus:border-gray-300 focus:ring-gray-300';
}
@endphp

<textarea id="{{ $id }}" name="{{ $name }}" {{ $disabled }}
    {!! $attributes->merge(['class' => "px-3 py-2 w-full min-h-10 text-gray-600 border $border rounded-md focus:ring focus:ring-gray-300 focus:ring-opacity-50"]) !!}>
    {{ $value }}
</textarea>

@error($name)
<p class="text-red-400 text-sm">{{ $message }}</p>
@enderror
