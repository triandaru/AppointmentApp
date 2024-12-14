<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\UserAppointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Mengambil janji temu dari relasi appointments pada model User
        $appointments = Appointment::all()->map(function ($appointment) {
            $appointment->start = \Carbon\Carbon::parse($appointment->start)->toIso8601String();
            $appointment->end = \Carbon\Carbon::parse($appointment->end)->toIso8601String();
            return $appointment;
        });

        return view('appointments.index', compact('appointments'));
    }


    public function create()
    {
        $users = User::all();
        return view('appointments.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'participants' => 'required|array',
        ]);

        $appointment = Appointment::create([
            'title' => $request->title,
            'creator_id' => Auth::id(),
            'start' => $request->start,
            'end' => $request->end,
        ]);

        foreach ($request->participants as $userId) {
            UserAppointment::create([
                'user_id' => $userId,
                'appointment_id' => $appointment->id,
            ]);
        }

        return redirect()->route('appointments.index');
    }
}
