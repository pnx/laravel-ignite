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
        class="flex items-center w-20 h-10 p-1 bg-white border rounded-full transition-color duration-500 cursor-pointer" x-bind:class="isChecked() ? 'bg-blue-200' : ''">
        <div {!! $attributes->merge(['class' => 'h-8 w-8 rounded-full bg-blue-400 transition-transform duration-500 transform'])->only('class', 'required') !!} x-bind:class="isChecked() ? 'translate-x-10' : ''"></div>
    </div>
</div>
