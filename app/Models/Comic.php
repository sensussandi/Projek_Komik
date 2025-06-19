<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Chapter;
use App\Models\Komentar;

class Comic extends Model
{

    protected $table = 'komik'; 
   
    protected $fillable = ['title', 'image_path'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'komik_id');
    }

    public function latestChapters()
    {
        return $this->hasMany(Chapter::class, 'komik_id')
            ->orderBy('nomor_chapter', 'desc');
    }

     public function komentars()
    {
        return $this->hasMany(Komentar::class,'komik_id');
    }

}
