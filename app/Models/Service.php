<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price_text',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    // Scope: published services ordered
    public function scopePublished($query)
    {
        return $query
            ->where('is_published', true)
            ->orderBy('sort_order');
    }
}
