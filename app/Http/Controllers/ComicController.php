<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();  
        return view('home', compact('comics'));
    }

    public function search(Request $request)
    {
        $query = $request->input('searching');
        $komik = Comic::where('judul', 'like', "%{$query}%")
                    ->whereHas('chapters') 
                    ->with(['latestChapters', 'chapters'])
                    ->get();

        return view('komik.result', compact('komik','query'));
    }
    public function show($id)
        {
            $komik = Comic::with(['chapters' => function($query){
                $query->orderBy('nomor_chapter','desc');
                    }, 'komentars.user'
                    ])->findOrFail($id);
            return view('komik.desc', compact('komik'));
        }

 



}
