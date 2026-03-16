<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'key',
        'title',
        'body',
        'meta_title',
        'meta_description',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    // Scope: only published pages
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
