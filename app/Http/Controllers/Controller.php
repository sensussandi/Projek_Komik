<?php

// Namespace untuk controller utama Laravel
namespace App\Http\Controllers;

// Trait bawaan Laravel untuk otorisasi (misal: policy, gate)
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

// Trait untuk menjalankan job queue (misalnya: dispatch job)
use Illuminate\Foundation\Bus\DispatchesJobs;

// Trait untuk validasi request (digunakan untuk memvalidasi form input)
use Illuminate\Foundation\Validation\ValidatesRequests;

// Menggunakan BaseController bawaan Laravel sebagai parent
use Illuminate\Routing\Controller as BaseController;

// Definisi kelas Controller utama yang menjadi dasar semua controller
class Controller extends BaseController
{
    // Menggunakan trait bawaan Laravel untuk otorisasi, job, dan validasi
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Method custom bernama 'view' yang menerima nama view dan data opsional
    public function view($view, $data = [])
    {
        // Menyisipkan file view secara manual dari folder resources/views
        require_once '../resources/views/' . $view . '.blade.php';
    }
}
