<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'registration_number',
        'student_name',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'guardian_name',
        'guardian_phone',
        'school_origin',
        'program_choice',
        'notes',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}