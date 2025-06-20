<?php

// Menentukan namespace dari controller ini
namespace App\Http\Controllers;

// Mengimpor class Request untuk menangani input pengguna
use Illuminate\Http\Request;

// Mengimpor model Comic yang digunakan untuk query data komik dari database
use App\Models\Comic;

// Mendefinisikan class KategoriController yang mewarisi dari Controller bawaan Laravel
class KategoriController extends Controller
{
    // Method untuk menampilkan komik berdasarkan genre
    public function show($genre)
    {
        // Mengambil semua komik yang memiliki genre sesuai parameter,
        // hanya jika komik tersebut memiliki chapter
        $comics = Comic::where('genre', 'LIKE', "%$genre%") // filter berdasarkan genre (tidak case sensitive, bisa sebagian kata)
            ->whereHas('chapters') // hanya komik yang memiliki relasi chapter
            ->with('latestChapters') // load relasi latestChapters (biasanya 1 chapter terakhir)
            ->get(); // eksekusi query dan ambil hasilnya

        // Tampilkan view kategori.blade.php dengan data comics dan genre
        return view('kategori', compact('comics', 'genre'));
    }
}
