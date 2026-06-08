<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'email',
        'phone',
        'address',
        'description',
        'vision',
        'mission',
        'logo',
        'hero_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
    ];
}