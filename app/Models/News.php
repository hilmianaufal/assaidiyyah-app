<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'news_category_id',
        'author_id',
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'content',
        'status',
        'published_at',
        'is_featured',
        'views',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function tags()
{
    return $this->belongsToMany(NewsTag::class);
}
}