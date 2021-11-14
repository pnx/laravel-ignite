<?php

namespace Ignite\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Id attribute
     *
     * @var string
     */
    public string $id;

    /**
     * Name attribute
     *
     * @var string
     */
    public string $name;

    /**
     * Value attribute
     *
     * @var string|null
     */
    public ?string $value;

    /**
     * Type attribute
     *
     * @var string|null
     */
    public string $type;

    /**
     * Disabled attribute
     *
     * @var string|null
     */
    public string $disabled;

    /**
     * Create a new component instance.
     *
     * @var string $name
     * @var string|null $id
     * @var string $type
     * @var string|null $value
     * @var bool $disabled
     * @return void
     */
    public function __construct(string $name, ?string $id = null, string $type = 'text', ?string $value = '', bool $disabled = false)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value);
        $this->disabled = $disabled ? 'disabled' : '';
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ignite::input');
    }
}
