<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'class_name',
        'dormitory',
        'guardian_name',
        'guardian_phone',
        'photo',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}