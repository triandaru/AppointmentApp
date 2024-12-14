<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'appointment_id'];

    // Relasi dengan tabel appointments melalui user_appointments
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'user_appointments', 'user_id', 'appointment_id');
    }
}
