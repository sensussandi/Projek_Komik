<?php

namespace App\Http\Controllers;

use App\Models\Comic;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();  // ambil semua data komik
        return view('home', compact('comics'));
    }
}
