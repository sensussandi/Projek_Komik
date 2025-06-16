<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class KategoriController extends Controller
{
    public function show($genre)
    {
        $comics = Comic::where('genre', $genre)->get();
        return view('kategori', compact('comics', 'genre'));
    }
}
