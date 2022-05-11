<?php

namespace Tests\Fixtures\Resources;

use Tests\Fixtures\Models\User;
use Ignite\Resource;

class UserTitleMethodResource extends Resource
{
    public static $model = User::class;

    public function title()
    {
        return "Name: " . $this->name;
    }
}
