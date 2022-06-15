<?php

// Abit ugly to call a init function from view script
// and pass $_instance variable (livewire defines it).
// But it works, so do it for now :)
$initLivewire($_instance ?? null);

?>

<div x-data="Ignite.checkbox({{ $jsonOptions() }})">

    {{-- Actual hidden input field --}}
    <input type="hidden" x-bind:value="checked" x-ref="input" id="{{ $id }}" name="{{ $name }}" @if($value)value="{{ $value }}"@endif {{ $disabled }} {!! $attributes->except('class', 'required') !!} />

    <div x-on:click="toggle()"
        class="flex items-center h-6 w-6 bg-white border rounded-md transition-color duration-250 cursor-pointer" x-bind:class="isChecked() ? 'bg-blue-200 border-blue-400' : ''">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            x-show="isChecked()"
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-250"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            {!! $attributes->merge(['class' => 'text-blue-400'])->only('class', 'required') !!} >
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
    </div>
</div>
