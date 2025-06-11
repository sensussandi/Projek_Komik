<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class PopulerController extends controller
{
    public function index()
    {
        $comics = Comic::orderBy('views', 'desc')->take(10)->get(); // pastikan ada kolom views
        return view('populer', compact('comics'));
    }
}