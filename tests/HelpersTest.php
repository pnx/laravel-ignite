<?php

namespace Tests;

use StdClass;
use Ignite\Helpers;

class HelpersTest extends TestCase
{
    public function test_can_get_nested_objects()
    {
        $obj = new StdClass();
        $obj->first = new StdClass();
        $obj->first->second = 42;

        $result = Helpers::objGetNested($obj, 'first.second');

        $this->assertSame(42, $result);
    }

    public function test_get_nested_objects_fails_to_get_nonexistent_property()
    {
        $this->expectException(\ErrorException::class);

        Helpers::objGetNested(new StdClass(), 'non.existent');
    }
}
