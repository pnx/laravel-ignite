<?php

namespace Ignite\View\Components;

class Checkbox extends AbstractInput
{
    use Traits\Livewire;

    public function jsonOptions()
    {
        return json_encode((object) [
            'checked' => (bool) $this->value
        ]);
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ignite::checkbox');
    }
}
