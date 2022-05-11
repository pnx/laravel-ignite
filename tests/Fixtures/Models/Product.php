<?php

namespace Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'price'
    ];
}
