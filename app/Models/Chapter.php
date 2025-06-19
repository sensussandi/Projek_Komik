<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Komentar;

class Chapter extends Model
{
    protected $table = 'chapter';

    public function comic()
    {
        return $this->belongsTo(Comic::class, 'komik_id');
    }

    public function pages()
    {
    return $this->hasMany(Halaman::class)->orderBy('urutan');
    }

    




}