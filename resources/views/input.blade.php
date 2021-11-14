@php
if ($errors->has($name)) {
    $border = 'border-red-400 focus:border-red-500 focus:ring-red-500';
} else {
    $border = 'border-gray-200 focus:border-gray-300 focus:ring-gray-300';
}
@endphp

<input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" @if($value)value="{{ $value }}"@endif {{ $disabled }}
    {!! $attributes->merge(['class' => "px-3 py-2 w-full h-10 text-gray-600 border $border rounded-md focus:ring focus:ring-gray-300 focus:ring-opacity-50"]) !!}
/>

@error($name)
<p class="text-red-400 text-sm">{{ $message }}</p>
@enderror
