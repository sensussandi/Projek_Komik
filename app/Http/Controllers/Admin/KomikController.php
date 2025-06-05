<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komik;

class KomikController extends Controller
{
    public function create()
    {
        return view('admin.komik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'sinopsis' => 'required|string',
        ]);

        Komik::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'sinopsis' => $request->sinopsis,
        ]);

        return redirect()->route('komik.create')->with('success', 'Komik berhasil ditambahkan!');
    }
}
