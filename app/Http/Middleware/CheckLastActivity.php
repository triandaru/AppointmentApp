<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckLastActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = Session::get('last_activity_time');
            $currentTime = now();

            if ($lastActivity && $currentTime->diffInMinutes($lastActivity) > 60) {
                Auth::logout(); // Logout pengguna
                Session::flush(); // Hapus semua sesi

                return redirect()->route('showLoginForm')->with('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
            }

            // Perbarui waktu aktivitas terakhir
            Session::put('last_activity_time', now());
        }

        return $next($request);
    }
}
