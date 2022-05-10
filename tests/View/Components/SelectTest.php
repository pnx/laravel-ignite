<?php

namespace Tests\View\Components;

use Tests\TestCase;

class SelectTest extends TestCase
{
    public function test_render()
    {
        try {
            $this->withViewErrors([])
                ->blade('<x-ignite-select name="my-select" :options="[\'one\', \'two\']" />');
            $this->assertTrue(true);
        } catch (\Exception $ex) {
            $this->fail("Failed to render component: " . $ex->getMessage());
        }
    }
}
