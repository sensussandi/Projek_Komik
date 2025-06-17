<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Chapter;

class Comic extends Model
{
    protected $table = 'komik';
    protected $fillable = ['title', 'image_path'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'komik_id');
    }

    // Ambil 2 chapter terbaru berdasarkan nomor_chapter
    public function latestChapters()
    {
        return $this->hasMany(Chapter::class, 'komik_id')
            ->orderBy('nomor_chapter', 'desc');
    }
}
