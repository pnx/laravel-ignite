<?php

namespace Tests\Fixtures\Resources;

use Tests\Fixtures\Models\User;
use Ignite\Resource;

class UserTitlePropertyResource extends Resource
{
    public static $model = User::class;

    public static $title = 'email';
}
