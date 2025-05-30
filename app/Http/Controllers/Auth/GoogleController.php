<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user berdasarkan google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            // Kalau belum ada user dengan google_id, coba cari berdasarkan email
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->first();

                if ($user) {
                    // Jika ada user dengan email yang sama, update google_id nya
                    $user->update(['google_id' => $googleUser->getId()]);
                } else {
                    // Kalau user belum ada sama sekali, buat user baru
                    $user = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'password' => bcrypt(Str::random(16)), // password random
                        // Karena biasanya user Google login tanpa password, kamu bisa isi password dengan random string supaya valid secara database:
                        'role' => 'user', // Atur role default sebagai user
                    ]);
                }
            }

            Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Autentikasi Google gagal');
        }
    }

}
