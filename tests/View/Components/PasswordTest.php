<?php

namespace Tests\View\Components;

use Tests\TestCase;

class PasswordTest extends TestCase
{
    public function test_render()
    {
        $view = $this->withViewErrors([])->blade('<x-ignite-password name="passwd" x-attribute="some-value" />');
        $view->assertSee('type="password"', false);
        $view->assertSee('x-attribute="some-value"', false);
    }
}
