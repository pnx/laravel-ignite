<?php

namespace Tests\Fixtures\Resources;

use Tests\Fixtures\Models\User;
use Ignite\Resource;

class UserQueryResource extends Resource
{
    public static $model = User::class;

    public function defaultQuery($query)
    {
        return $query->orderBy('name', 'desc')->orderBy('email');
    }
}
