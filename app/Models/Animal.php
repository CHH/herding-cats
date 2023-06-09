<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public $casts = [
        'birthday_at' => 'date:Y-m-d',
        'bought_at' => 'date:Y-m-d',
        'sold_at' => 'date:Y-m-d',
        'death_at' => 'date:Y-m-d',
    ];

    public $guarded = [];
}
