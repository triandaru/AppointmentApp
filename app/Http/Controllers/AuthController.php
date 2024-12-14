<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\UserAppointment;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
        ]);

        $user = User::where('username', $request->username)->first();

        Auth::login($user);

        return redirect()->route('appointments.index');
    }
}
