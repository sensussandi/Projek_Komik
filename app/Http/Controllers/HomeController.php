<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic; // pastikan model Comic sudah dibuat

class HomeController extends Controller
{
    public function index()
  {
      $comics = Comic::with(['latestChapters', 'chapters'])
                  ->whereHas('chapters') 
                  ->get();

      return view('home', compact('comics'));
  }
}
