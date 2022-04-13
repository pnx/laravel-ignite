<?php

namespace Ignite\View\Components;

use Illuminate\View\Component;

class Textarea extends AbstractInput
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ignite::textarea');
    }
}
