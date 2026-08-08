<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['unit', 'type', 'title', 'description', 'icon', 'image_icon'];

    public function galleries()
    {
        return $this->hasMany(ProgramGallery::class);
    }
}
