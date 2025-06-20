<?php

// Mendefinisikan namespace dari controller ini agar sesuai dengan struktur folder Laravel
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel untuk menangani input dari form
use Illuminate\Http\Request;

// Mengimpor model Komik agar bisa digunakan untuk menyimpan data ke tabel `komiks`
use App\Models\Komik;

// Mendeklarasikan class KomikController yang mewarisi Controller utama Laravel
class KomikController extends Controller
{
    // Method untuk menyimpan data komik baru ke dalam database
    public function store(Request $request)
    {
        // Membuat instance baru dari model Komik
        $komik = new Komik();

        // Mengisi atribut judul dari input form
        $komik->judul = $request->input('judul');

        // Mengisi atribut image_path dari input form (biasanya berupa path gambar)
        $komik->image_path = $request->input('image_path'); 

        // Menyimpan data komik ke database
        $komik->save();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Komik berhasil disimpan!');
    }
}
