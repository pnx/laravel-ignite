<?php

namespace Tests;

use Ignite\FormServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [FormServiceProvider::class];
    }
}
