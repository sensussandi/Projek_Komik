<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class KategoriController extends Controller
{
        public function show($genre)
    {
        $comics = Comic::where('genre', 'LIKE', "%$genre%")
            ->whereHas('chapters') // hanya komik yang punya chapter
            ->with('latestChapters')
            ->get();

        return view('kategori', compact('comics', 'genre'));
    }
}
