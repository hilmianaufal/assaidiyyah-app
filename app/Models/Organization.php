<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'position',
        'photo',
        'bio',
        'sort_order',
        'status',
    ];
}