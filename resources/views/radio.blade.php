<?php

// Abit ugly to call a init function from view script
// and pass $_instance variable (livewire defines it).
// But it works, so do it for now :)
$bootstrap($_instance ?? null);

?>

<div x-data="Ignite.radio({{ $jsonOptions() }})" class="space-y-2">

    {{-- Actual hidden input field --}}
    <input type="hidden" x-bind:value="value" x-ref="input"
        id="{{ $id }}" name="{{ $name }}" @if($value)value="{{ $value }}"@endif {{ $disabled }} @if($required)required @endif {!! $attributes->except('class') !!} />

    @foreach($options as $id => $name)

    <div x-on:click="select('{{ $id }}')" class="flex items-center space-x-2 cursor-pointer">

        <span>{{ $name }}</span>

        <div class="p-1 h-6 w-6 bg-white border rounded-full">

            <div x-cloak x-show="isSelected('{{ $id }}')"
                x-transition:enter="transition ease-out duration-250"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-250"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                {!! $attributes->merge(['class' => 'w-full h-full rounded-full bg-blue-400'])->only('class', 'required') !!} >
            </div>
        </div>
    </div>
    @endforeach
</div>
