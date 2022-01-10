<?php

namespace Ignite\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    /** @var string */
    public $action;

    /** @var string */
    public $method;

	/**
	 * Used to spoof PUT, PATCH, or DELETE requests
	 * as forms can only make GET/POST.
	 *
	 * @var string
	 */
    public $realmethod;

    public function __construct(string $action, string $method = 'POST')
    {
        $this->action = $action;

        if (in_array($method, ['GET', 'POST'])) {
            $this->method = $method;
        } else {
            $this->realmethod = $method;
            $this->method = 'POST';
        }
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ignite::form');
    }
}
