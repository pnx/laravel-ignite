@php

$classes = 'font-medium text-sm text-gray-700';

switch($type) {
case 'inline' :
    break;
case 'block' :
default :
    $classes = "block $classes";
}

@endphp

<label {{ $attributes->merge([ 'class' => $classes ]) }}>
    {{ $slot }}
</label>
