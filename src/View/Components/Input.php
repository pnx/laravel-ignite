<?php

namespace Ignite\View\Components;

class Input extends AbstractInput
{
    /**
     * Type attribute
     *
     * @var string|null
     */
    public string $type;

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
        $this->type = $type;
        $this->init($name, $id, $value, $disabled);
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
