<?php

namespace Tests\Components;

use Tests\TestCase;

class LabelTest extends TestCase
{
    public function test_render()
    {
        $view = $this->blade('<x-ignite-label x-attribute="some-value">My label</x-ignite-label>');
        $view->assertSeeText('My label');
        $view->assertSee('x-attribute="some-value"', false);
    }
}
