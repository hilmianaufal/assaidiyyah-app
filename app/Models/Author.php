<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
    'name',
    'photo',
    'class_name',
    'role',
    'bio',
];

public function news()
{
    return $this->hasMany(News::class);
}
}
