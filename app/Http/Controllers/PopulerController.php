<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class PopulerController extends controller
{
    public function index()
    {

       $comics = Comic::whereHas('chapters')
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();

        return view('populer', compact('comics'));
    }
}