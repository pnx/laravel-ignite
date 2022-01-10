<?php

namespace Ignite\View\Components;

use Illuminate\View\Component;

class Label extends Component
{
    public $type;

    public function __construct($type = 'block')
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ignite::label');
    }
}
