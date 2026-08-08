<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramGallery extends Model
{
    protected $fillable = ['program_id', 'image_path'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
