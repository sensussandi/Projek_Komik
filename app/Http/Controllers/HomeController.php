<?php

// Namespace controller sesuai struktur Laravel
namespace App\Http\Controllers;

// Import class Request untuk menangani HTTP request
use Illuminate\Http\Request;

// Closure sepertinya tidak digunakan di sini (bisa dihapus jika tidak dipakai)
use Closure;

// Import model Comic agar bisa digunakan untuk query data komik
use App\Models\Comic;

// Import Auth untuk akses user login (tidak dipakai dalam fungsi ini, bisa dihapus jika tidak dibutuhkan)
use Illuminate\Support\Facades\Auth;

// Definisi class HomeController yang merupakan turunan dari Laravel Controller
class HomeController extends Controller
{
    // Method index untuk menampilkan halaman utama user
    public function index()
    {
        // Ambil semua data komik yang memiliki chapter,
        // sekaligus memuat relasi 'latestChapters' dan 'chapters'
        $comics = Comic::with(['latestChapters', 'chapters']) // eager loading untuk menghindari N+1 problem
                       ->whereHas('chapters') // hanya komik yang memiliki chapter
                       ->get(); // eksekusi dan ambil data

        // Kirim data komik ke view 'home.blade.php'
        return view('home', compact('comics'));
    }
}
