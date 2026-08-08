<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['unit', 'title', 'caption', 'image_path', 'order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeUnit($query, string $unit)
    {
        return $query->where('unit', $unit)->where('is_active', true)->orderBy('order');
    }
}
