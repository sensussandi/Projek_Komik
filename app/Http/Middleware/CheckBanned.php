<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->is_banned) {
            Auth::logout(); // keluarkan user

            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda telah diblokir.'
            ]);
        }

        return $next($request);
    }
}
