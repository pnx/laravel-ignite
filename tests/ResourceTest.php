<?php

namespace Tests;

use Tests\Fixtures\Models\User;
use Tests\Fixtures\Models\Product;
use Tests\Fixtures\Resources\UserResource;
use Tests\Fixtures\Resources\UserQueryResource;
use Tests\Fixtures\Resources\UserTitlePropertyResource;
use Tests\Fixtures\Resources\UserTitleMethodResource;
use Tests\Fixtures\Resources\UserSubtitleResource;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_constructor()
    {
        $user1 = User::create(['id' => 1, 'name' => 'Some name', 'email' => 'test@example.com']);
        $user2 = User::create(['id' => 2, 'name' => 'Some other name', 'email' => 'test2@example.com']);

        $resource = new UserResource();
        $this->assertNull($resource->id);

        $resource2 = new UserResource($user1);
        $this->assertTrue($resource2->is($user1));

        $resource3 = new UserResource(2);
        $this->assertTrue($resource3->is($user2));
    }

    public function test_constructor_fails_with_other_model()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Model must be a instance of Tests\Fixtures\Models\User, got Tests\Fixtures\Models\Product');

        $product = Product::create(['name' => 'Awesome TV X11W', 'type' => 'TV', 'price' => 100]);

        $resource = new UserResource($product);
    }

    public function test_constructor_fails_with_nonexistant_id()
    {
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        $user = User::create(['id' => 1, 'name' => 'Some name', 'email' => 'test@example.com']);

        $resource = new UserResource(2);
    }

    public function test_methods()
    {
        $user = User::create(['id' => 1, 'name' => 'Some name', 'email' => 'test@example.com']);

        $resource = new UserResource($user);

        $this->assertEquals(1, $resource->title());
        $this->assertEmpty($resource->subtitle());
        $this->assertNull($resource->thumbnail());
        $this->assertEquals('Some name', $resource->name);
        $this->assertEquals('test@example.com', $resource->attribute('email'));

        // Test that __call() forwards to model.
        $resource->fill(['name' => 'New name']);
        $this->assertEquals('New name', $resource->name);

        // Test that __callStatic() forwards to model.
        $this->assertEquals('test@example.com', $resource::find(1)->email);
    }

    public function test_title_property_override()
    {
        $user = User::create(['id' => 1, 'name' => 'Some name', 'email' => 'test@example.com']);

        $resource = new UserTitlePropertyResource($user);
        $this->assertEquals('test@example.com', $resource->title());
    }

    public function test_title_method_override()
    {
        $user = User::create(['id' => 1, 'name' => 'Some name', 'email' => 'test@example.com']);

        $resource = new UserTitleMethodResource($user);
        $this->assertEquals('Name: Some name', $resource->title());
    }

    public function test_subtitle()
    {
        $user = User::create(['id' => 1, 'name' => 'Some name', 'email' => 'test@example.com']);

        $resource = new UserSubtitleResource($user);
        $this->assertEquals('test@example.com', $resource->subtitle());
    }

    public function test_query()
    {
        $resource = new UserResource();

        $this->assertStringContainsString('limit 15', $resource->query()->toSql());
    }

    public function test_default_query()
    {
        $resource = new UserQueryResource();
        $expected = 'order by "name" desc, "email" asc';

        $this->assertStringContainsString($expected, $resource->query()->toSql());
        $this->assertStringContainsString($expected, UserQueryResource::query()->toSql());
    }

    public function test_new()
    {
        $user = User::create(['id' => 1, 'name' => 'Some name', 'email' => 'test@example.com']);

        $resource1 = new UserResource();
        $this->assertNull($resource1->title());

        $resource2 = $resource1->new($user);
        $this->assertEquals(1, $resource2->id);
    }
}
