<?php

namespace Ignite\View\Components\Traits;

use Illuminate\Support\Arr;

trait Livewire
{
    public function initLivewire($livewire)
    {
        // Check if Livewire is present.
		if ($livewire && class_exists('\Livewire\WireDirective')) {

			// If so. check for wire:model value and set $this->value
			$value = $this->attributes->wire('model')->value();
			if ($value) {
				$value = Arr::get($livewire->all(), $value);

                if (is_object($value) && method_exists($value, 'toString')) {
                    $this->value = $value->toString();
                } else {
                    $this->value = $value;
                }
			}
		}
    }
}
