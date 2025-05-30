<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komik;

class KomikController extends Controller
{
    public function store(Request $request)
    {
        $komik = new Komik();
        $komik->judul = $request->input('judul');
        $komik->image_path = $request->input('image_path'); 
        $komik->save();

        return redirect()->back()->with('success', 'Komik berhasil disimpan!');
    }
}
