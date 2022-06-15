<?php

namespace Tests\View\Components;

use Tests\TestCase;

class ToggleSwitchTest extends TestCase
{
    public function test_render()
    {
        $view = $this->withViewErrors([])->blade('<x-ignite-toggle-switch name="cbox" x-leet="1337" />');
        $view->assertSee('x-leet="1337"', false);
    }
}
