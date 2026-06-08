<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'image',
        'description',
        'sort_order',
        'status',
    ];
}