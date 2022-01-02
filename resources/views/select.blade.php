<?php

// Abit ugly to call a init function from view script
// and pass $_instance variable (livewire defines it).
// But it works, so do it for now :)
$init($_instance ?? null);

$icon = config('ignite.select.icon');
?>

<div class="relative inline-block w-full"
    x-init="$watch('value', (v) => { $refs.input.dispatchEvent(new Event('input')); })"
    x-data="Ignite.select_dropdown({{ $jsonOptions() }})"
    x-on:click.away="close()"
    x-on:close.stop="close()">

    {{-- Actual hidden input field --}}
    <input type="hidden" x-bind:value="value" x-ref="input" {{ $attributes->except('class', 'required') }} />

    {{-- Visual input field --}}
    <div x-on:click="toggle()" class="flex items-center cursor-pointer">

        <x-ignite-input x-bind:value="display" :name="$name . '_display'" type="text"
            x-bind:class="{ 'text-gray-600': isPlaceholderSelected() }"
            {{ $attributes->merge(['class' => 'select-none cursor-pointer', 'required' => $required ])->only('class', 'required') }}
            readonly
        />

        @if ($icon)
        {{ svg("$icon")->class("-ml-6 h-5 w-5 text-gray-500") }}
        @endif
    </div>

    {{-- Dropdown menu --}}
    <ul
        x-show="show"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"

        x-cloak
        class="absolute block w-full mt-1 z-50 rounded border bg-white divide-y overflow-y-auto {{ $dropdown_class }}">

        @includeWhen($required === false,
            'ignite::select-item', [ 'isPlaceholder' => true, 'display' => $placeholder ])

        @foreach($options as $k => $item)
            @include('ignite::select-item', [
                'isPlaceholder' => false,
                'value' => $k,
                'display' => $getDisplayValue($item),
                'item' => $item
            ])
        @endforeach
    </ul>
</div>
