<?php

namespace Tests\Components;

use Tests\TestCase;

class EmailTest extends TestCase
{
    public function test_render()
    {
        $view = $this->withViewErrors([])->blade('<x-ignite-email name="email" x-attribute="some-value" />');
        $view->assertSee('type="email"', false);
        $view->assertSee('x-attribute="some-value"', false);
    }
}
