<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    // Helper: get setting value easily
    public static function getValue($key, $default = null)
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    // Helper: set value
    public static function setValue($key, $value)
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
