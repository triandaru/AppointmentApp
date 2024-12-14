<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'creator_id', 'start', 'end'];

    // Relasi dengan tabel users melalui user_appointments
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_appointments', 'appointment_id', 'user_id');
    }

    // Relasi dengan creator (User)
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
