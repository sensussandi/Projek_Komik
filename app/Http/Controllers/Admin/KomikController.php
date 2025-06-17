<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komik;

class KomikController extends Controller
{
    
    public function create()
    {
        return view('admin.create');
    }
    // Method untuk menampilkan dashboard
    public function dashboard()
    {
        $komiks = Komik::all();
        return view('admin.dashboard', compact('komiks'));
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'sinopsis' => 'required|string',
            'genre' => 'nullable|string|max:100',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Komik::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'sinopsis' => $request->sinopsis,
            'genre' => $request->genre,
            'cover_url' => $coverPath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Komik berhasil ditambahkan!');
    }

public function edit($id)
{
    $komik = Komik::findOrFail($id);
    return view('admin.edit', compact('komik'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:100',
        'penulis' => 'required|string|max:100',
        'sinopsis' => 'required|string',
        'genre' => 'nullable|string|max:100',
    ]);

    $komik = Komik::findOrFail($id);
    $komik->judul = $request->judul;
    $komik->penulis = $request->penulis;
    $komik->sinopsis = $request->sinopsis;
    $komik->genre = $request->genre;

    if ($request->hasFile('cover')) {
        $coverPath = $request->file('cover')->store('cover', 'public');
        $komik->cover_url = $coverPath;
    }

    $komik->save();

    return redirect()->route('admin.dashboard')->with('success', 'Komik berhasil diperbarui!');
}

public function destroy($id)
{
    $komik = Komik::findOrFail($id);
    $komik->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Komik berhasil dihapus!');
}
}
