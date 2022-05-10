<?php

namespace Tests\View\Components;

use Tests\TestCase;

class TextareaTest extends TestCase
{
    public function test_attributes_renders_correctly()
    {
        $view = $this->withViewErrors([])
            ->blade('<x-ignite-textarea name="my-textarea" value="0ccf708" x-attribute="some-value" />');
        $view->assertSeeInOrder(['<textarea', 'x-attribute="some-value"', '</textarea>'], false);
        $view->assertSeeText('0ccf708');
    }

    public function test_errors_renders_correctly()
    {
        $view = $this->withViewErrors(['my-textarea' => '693d87b'])
            ->blade('<x-ignite-textarea name="my-textarea" />');
        $view->assertSeeText('693d87b');
    }
}
