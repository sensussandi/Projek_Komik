<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapter';

    public function comic()
    {
        return $this->belongsTo(Comic::class, 'komik_id');
    }
}