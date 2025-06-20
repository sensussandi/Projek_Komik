<?php

// Namespace dari controller ini, sesuai struktur folder di Laravel
namespace App\Http\Controllers;

// Import class Request dari Laravel untuk menangani HTTP request
use Illuminate\Http\Request;

// Import model Comic yang digunakan untuk mengambil data komik dari database
use App\Models\Comic;

// Deklarasi kelas controller bernama PopulerController
class PopulerController extends controller
{
    // Fungsi index untuk menampilkan halaman komik populer
    public function index()
    {
        // Ambil 10 data komik terbaru yang memiliki chapter
        $comics = Comic::whereHas('chapters') // hanya komik yang punya relasi chapters
            ->orderBy('id', 'desc')           // urutkan dari yang terbaru
            ->take(10)                        // batasi hanya ambil 10 komik
            ->get();                          // eksekusi query dan ambil hasilnya

        // Tampilkan view bernama 'populer' sambil mengirim data $comics ke view tersebut
        return view('populer', compact('comics'));
    }
}
