<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    protected $table = 'halaman';

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
