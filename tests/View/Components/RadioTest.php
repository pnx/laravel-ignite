<?php

namespace Tests\View\Components;

use Tests\TestCase;

class RadioTest extends TestCase
{
    public function test_render()
    {
        $view = $this->withViewErrors([])->blade('<x-ignite-radio name="radio" x-attr="val" :options="[\'One\', \'Two\']" />');
        $view->assertSee('id="radio"', false);
        $view->assertSee('x-attr="val"', false);
        $view->assertSee('x-on:click="select(\'0\')"', false);
        $view->assertSee('x-on:click="select(\'1\')"', false);
    }
}
