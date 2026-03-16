<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'cover_image_path',
        'meta_title',
        'meta_description',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Automatically create slug if empty
    // protected static function booted()
    // {
    //     static::saving(function ($post) {
    //         if (empty($post->slug)) {
    //             $post->slug = Str::slug($post->title);
    //         }
    //     });
    // }

    // Scope: published posts
    public function scopePublished($query)
    {
        return $query
            ->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('published_at');
    }
}
