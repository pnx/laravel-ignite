<?php

namespace Tests;

use Ignite\FormServiceProvider;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use InteractsWithViews;
    
    protected function getPackageProviders($app): array
    {
        return [FormServiceProvider::class];
    }
}
