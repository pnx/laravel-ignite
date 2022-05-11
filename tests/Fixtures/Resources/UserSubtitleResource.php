<?php

namespace Tests\Fixtures\Resources;

use Tests\Fixtures\Models\User;
use Ignite\Resource;

class UserSubtitleResource extends Resource
{
    public static $model = User::class;

    public function subtitle()
    {
        return $this->email;
    }
}
