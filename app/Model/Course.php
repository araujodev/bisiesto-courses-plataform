<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'caption',
        'description',
        'price',
        'price_discount',
        'active'
    ];
}
