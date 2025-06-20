<?php

// Menentukan namespace dari controller ini
namespace App\Http\Controllers;

// Mengimpor model Komentar yang digunakan untuk menyimpan data komentar ke database
use App\Models\Komentar;

// Mengimpor class Request untuk menangani permintaan HTTP
use Illuminate\Http\Request;

// Mengimpor Auth untuk mendapatkan ID user yang sedang login
use Illuminate\Support\Facades\Auth;

// Mendefinisikan class KomentarController yang mewarisi class Controller
class KomentarController extends Controller
{
    // Method untuk menyimpan komentar ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'komik_id' => 'required|exists:komik,id', // Harus ada dan sesuai dengan ID di tabel komik
            'isi_komentar' => 'required|string|max:1000', // Wajib diisi, berupa teks, maksimal 1000 karakter
        ]);

        // Menyimpan komentar ke database menggunakan model Komentar
        Komentar::create([
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
            'komik_id' => $request->komik_id, // Ambil ID komik dari form
            'isi_komentar' => $request->isi_komentar, // Ambil isi komentar dari form
        ]);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}
