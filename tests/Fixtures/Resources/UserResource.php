<?php

namespace Tests\Fixtures\Resources;

use Tests\Fixtures\Models\User;
use Ignite\Resource;

class UserResource extends Resource
{
    public static $model = User::class;
}
