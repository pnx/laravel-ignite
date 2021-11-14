<?php

namespace Ignite\View\Components;

class Email extends Input
{
    /**
     * Create a new component instance.
     *
     * @var string $name
     * @var string|null $id
     * @var string|null $value
     * @var bool $disabled
     * @return void
     */
    public function __construct(string $name, ?string $id = null, ?string $value = '', bool $disabled = false)
    {
        parent::__construct($name, $id, "email", $value, $disabled);
    }
}
