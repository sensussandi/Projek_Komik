<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Komentar;

class Chapter extends Model
{
    protected $table = 'chapter';
    // Ini sangat penting untuk mencegah error timestamps
    public $timestamps = false;
    protected $fillable = [
        'komik_id',
        'judul_chapter',
        'nomor_chapter'
    ];


    public function komik()
    {
        return $this->belongsTo(Komik::class, 'komik_id');
    }

    public function pages()
    {
    return $this->hasMany(Halaman::class)->orderBy('urutan');
    }

    




    public function images()
    {
        return $this->hasMany(ChapterImage::class, 'chapter_id')->orderBy('urutan');
    }
}
