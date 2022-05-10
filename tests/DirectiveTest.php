<?php

namespace Tests;

use Illuminate\Support\Facades\Blade;

class DirectiveTest extends TestCase
{
    public function test_can_render_javascript_source()
    {
        $this->get('/ignite/ignite.js')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'text/javascript');
    }

    public function test_can_render_script_directive()
    {
        $compiled = Blade::compileString("@igniteScripts");

        $expected = "<script type=\"text/javascript\" src=\"/ignite/ignite.js\"></script>";

        $this->assertSame($expected, $compiled);
    }
}
