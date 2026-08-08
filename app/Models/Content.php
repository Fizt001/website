<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['unit', 'section', 'key', 'value'];

    public static function getValue(string $unit, string $section, string $key, string $default = ''): string
    {
        $content = static::where('unit', $unit)
            ->where('section', $section)
            ->where('key', $key)
            ->first();
        return $content ? $content->value : $default;
    }
}
