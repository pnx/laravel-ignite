<?php

namespace Tests;

use Ignite\ResourceManager;
use Tests\Fixtures\Resources\UserResource;
use Illuminate\Contracts\Container\BindingResolutionException;

class ResourceManagerTest extends TestCase
{
    public function test_singleton()
    {
        $manager = app()->make(ResourceManager::class);
        $manager2 = app()->make(ResourceManager::class);

        $manager->setNamespace('custom-namespace');
        $this->assertEquals('custom-namespace', $manager->getNamespace());
        $this->assertEquals('custom-namespace', $manager2->getNamespace());
    }

    public function test_make()
    {
        $manager = app()->make(ResourceManager::class);
        $manager->setNamespace('Tests\\Fixtures\\Resources');

        $user = $manager->make('user');
        $this->assertTrue($user instanceof UserResource);
    }

    public function test_make_fails_on_nonexistant_resource()
    {
        $this->expectException(BindingResolutionException::class);

        $manager = app()->make(ResourceManager::class);
        $user = $manager->make('non-existant');
    }
}
