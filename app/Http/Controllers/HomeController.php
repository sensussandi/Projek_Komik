<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use App\Models\Comic; // pastikan model Comic sudah dibuat
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  
    public function index()
    {
        
        // $comics = Comic::all(); // ambil semua data komik
          $comics = Comic::with('latestChapters')->get();
        return view('home', compact('comics'));
        
        
    }
}
