<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Asep', 'username' => 'asep', 'preferred_timezone' => 'Asia/Jakarta']);
        User::create(['name' => 'Agus', 'username' => 'agus', 'preferred_timezone' => 'Asia/Jayapura']);
        User::create(['name' => 'Ujang', 'username' => 'ujang', 'preferred_timezone' => 'Pacific/Auckland']);
    }
}
