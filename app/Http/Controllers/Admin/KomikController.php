<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komik;
use App\Models\Chapter;

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
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'chapters'     => 'array',
            'chapters.*'   => 'nullable|string|max:255',
        ]);


        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        $komik = Komik::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'sinopsis' => $request->sinopsis,
            'genre' => $request->genre,
            'cover_url' => $coverPath,
        ]);
        //Simpan chapter (jika ada & tidak kosong)
        $chapterNumber = 1;
        foreach ($request->chapters ?? [] as $title) {
            $title = trim($title);
            if ($title === '') {
                $title = 'Chapter ' . $chapterNumber;
            }

            $komik->chapters()->create([
                'judul_chapter' => $title,
                'nomor_chapter' => $chapterNumber,
            ]);

            $chapterNumber++;
        }

        // 5️⃣ Redirect balik dengan pesan
        return back()->with('success', 'Komik & chapter berhasil disimpan!');
    }

    public function edit($id)
    {
        $komik = Komik::findOrFail($id);
        return view('admin.edit', compact('komik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'    => 'required|string|max:100',
            'penulis'  => 'required|string|max:100',
            'sinopsis' => 'required|string',
            'genre'    => 'nullable|string|max:100',
            'chapters' => 'array',
        ]);

        $komik = Komik::with('chapters')->findOrFail($id);
        $komik->update($request->only('judul', 'penulis', 'sinopsis', 'genre'));

        /* ---------- 1. Hapus chapter yang di-remove di form ---------- */
        $oldIds    = $komik->chapters->pluck('id')->toArray();                 // id lama
        $sentIds   = array_keys($request->input('chapters', []));              // id di form
        $sentIds   = array_filter($sentIds, fn($x) => $x !== 'new');               // kecuali 'new'
        $toDelete  = array_diff($oldIds, $sentIds);
        if ($toDelete) Chapter::whereIn('id', $toDelete)->delete();

        /* ---------- 2. Update judul chapter yg masih ada ---------- */
        foreach ($request->input('chapters', []) as $chId => $title) {
            if ($chId === 'new') continue;
            $title = trim($title);
            if ($title === '') $title = 'Chapter';                // default jika user kosongkan
            Chapter::where('id', $chId)->update(['judul_chapter' => $title]);
        }

        /* ---------- 3. Tambah chapter baru ---------- */
        $lastNumber = $komik->chapters()->max('nomor_chapter') ?? 0;
        foreach ($request->input('chapters.new', []) as $t) {
            $t = trim($t);
            if ($t === '') $t = 'Chapter ' . ($lastNumber + 1);
            $komik->chapters()->create([
                'judul_chapter' => $t,
                'nomor_chapter' => ++$lastNumber,
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Komik & chapter berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $komik = Komik::findOrFail($id);
        $komik->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Komik berhasil dihapus!');
    }
}
