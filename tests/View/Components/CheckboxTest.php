<?php

namespace Tests\View\Components;

use Tests\TestCase;

class CheckboxTest extends TestCase
{
    public function test_render()
    {
        $view = $this->withViewErrors([])->blade('<x-ignite-checkbox name="cbox" x-attr="val" />');
        $view->assertSee('id="cbox"', false);
        $view->assertSee('x-attr="val"', false);
    }
}
