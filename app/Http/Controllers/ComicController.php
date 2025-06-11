<?php

namespace App\Http\Controllers;

use App\Models\Comic;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();  
        return view('home', compact('comics'));
    }
}
