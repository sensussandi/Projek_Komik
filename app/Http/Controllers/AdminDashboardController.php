<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komik;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $komiks = Komik::all(); // ambil semua data komik
        return view('admin.dashboard', compact('komiks'));
    }
}
