<?php

// ① Namespace controller sesuai struktur folder Laravel
namespace App\Http\Controllers;

// ② Import class Request untuk menangani input HTTP
use Illuminate\Http\Request;

// ③ Import model Comic agar bisa query tabel komik
use App\Models\Comic;

// ④ Class ComicController mewarisi base Controller
class ComicController extends Controller
{
    /* =========================================================
       FUNGSI 1 — index()
       Menampilkan semua komik di halaman home
    ========================================================= */
    public function index()
    {
        // ⑤ Ambil semua data komik tanpa filter
        $comics = Comic::all();

        // ⑥ Kirim data $comics ke view 'home.blade.php'
        return view('home', compact('comics'));
    }

    /* =========================================================
       FUNGSI 2 — search()
       Mencari komik berdasarkan judul (query dari input 'searching')
    ========================================================= */
    public function search(Request $request)
    {
        // ⑦ Ambil keyword pencarian dari form input name="searching"
        $query = $request->input('searching');

        // ⑧ Query komik yang judulnya LIKE %keyword%,
        //    hanya komik yang punya chapter,
        //    serta eager-load relasi latestChapters dan semua chapters
        $komik = Comic::where('judul', 'like', "%{$query}%")
                      ->whereHas('chapters')                 // hanya komik yang punya chapter
                      ->with(['latestChapters', 'chapters']) // eager-load relasi
                      ->get();

        // ⑨ Tampilkan hasil ke view 'komik/result.blade.php'
        //    bersama variabel $komik dan $query
        return view('komik.result', compact('komik', 'query'));
    }

    /* =========================================================
       FUNGSI 3 — show()
       Menampilkan detail satu komik + daftar chapter & komentar
    ========================================================= */
    public function show($id)
    {
        // ⑩ Ambil komik berdasarkan id,
        //    - chapters di-order nomor_chapter DESC
        //    - komentars beserta user penulis komentar
        $komik = Comic::with([
                    'chapters' => function ($query) {
                        $query->orderBy('nomor_chapter', 'desc');
                    },
                    'komentars.user'   // eager-load relasi user di komentar
                 ])->findOrFail($id);  // 404 jika id tidak ada

        // ⑪ Kirim data $komik ke view 'komik/desc.blade.php'
        return view('komik.desc', compact('komik'));
    }
}
