<?php

namespace Ignite\View\Components;

class Password extends Input
{
    /**
     * Create a new component instance.
     *
     * @var string $name
     * @var string|null $id
     * @var bool $disabled
     * @return void
     */
    public function __construct(string $name = "password", ?string $id = null, bool $disabled = false)
    {
        parent::__construct($name, $id, "password", null, $disabled);
    }
}
