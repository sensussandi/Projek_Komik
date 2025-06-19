<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komik extends Model
{
    use HasFactory;

    protected $table = 'komik';

    // app/Models/Komik.php
    protected $fillable = [
        'judul', 'penulis', 'sinopsis', 'genre', 'cover_url'
    ];


    // Ini sangat penting untuk mencegah error timestamps
    public $timestamps = false;
}
