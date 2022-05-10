<?php

namespace Tests\View\Components;

use Tests\TestCase;

class FormTest extends TestCase
{
    public function test_render()
    {
        $view = $this->withViewErrors([])->blade('<x-ignite-form action="/" x-attribute="some-value">63e77f9ce68791aa9f4fa535667cc1fd39897fc6</x-ignite-form>');
        $view->assertSee('63e77f9ce68791aa9f4fa535667cc1fd39897fc6');
        $view->assertSee('x-attribute="some-value"', false);
    }

    public function test_render_custom_method()
    {
        $view = $this->withViewErrors([])
            ->blade('<x-ignite-form method="CUSTOM" action="/"></x-ignite-form>');
        $view->assertSee('method="POST"', false);
        $view->assertSee('<input type="hidden" name="_method" value="CUSTOM">', false);
    }
}
