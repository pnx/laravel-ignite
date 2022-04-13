<?php

namespace Ignite\View\Components;

use Illuminate\View\Component;

abstract class AbstractInput extends Component
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
    public function __construct(string $name, ?string $id = null, ?string $value = '', bool $disabled = false)
    {
        $this->init($name, $id, $value, $disabled);
    }

    /**
     * Initialize component
     *
     * @var string $name
     * @var string $id
     * @var string $type
     * @var string $value
     * @var bool $disabled
     * @return void
     */
    protected function init(string $name, ?string $id, ?string $value, bool $disabled)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value);
        $this->disabled = $disabled ? 'disabled' : '';
    }
}
