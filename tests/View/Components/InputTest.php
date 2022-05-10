<?php

namespace Tests\View\Components;

use Ignite\View\Components\Input;
use Tests\TestCase;

class InputTest extends TestCase
{
    public function test_attributes_renders_correctly()
    {
        $view = $this->withViewErrors([])->component(Input::class, ['name' => 'my-input']);
        $view->assertSee('name="my-input"', false);
        $view->assertSee('id="my-input"', false);

        $view = $this->withViewErrors([])->component(Input::class, ['name' => 'my-input', 'id' => 'custom-id']);
        $view->assertSee('name="my-input"', false);
        $view->assertSee('id="custom-id"', false);

        $view = $this->withViewErrors([])->component(Input::class, ['name' => 'my-input', 'disabled' => true]);
        $view->assertSee('disabled', false);
    }

    public function test_errors_renders_correctly()
    {
        $view = $this->withViewErrors(['my-input' => '97a4f6b20c41c657a19cc13880c0db2fb2bfa636'])
            ->component(Input::class, ['name' => 'my-input']);
        $view->assertSeeText('97a4f6b20c41c657a19cc13880c0db2fb2bfa636');
    }
}
