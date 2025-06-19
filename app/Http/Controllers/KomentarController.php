<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'komik_id' => 'required|exists:komik,id',
            'isi_komentar' => 'required|string|max:1000',
        ]);

        Komentar::create([
            'user_id' => Auth::id(),
            'komik_id' => $request->komik_id,
            'isi_komentar' => $request->isi_komentar,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}
