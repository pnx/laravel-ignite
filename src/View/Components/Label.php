<?php

namespace Ignite\View\Components;

use Illuminate\View\Component;

class Label extends Component
{
    public $type;

    public $value;

    public function __construct($value = null, $type = 'block')
    {
        $this->value = $value;
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
