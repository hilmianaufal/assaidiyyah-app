<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'student_name',
        'level',
        'category',
        'achievement_date',
        'image',
        'description',
        'status',
    ];

    protected $casts = [
        'achievement_date' => 'date',
    ];
}