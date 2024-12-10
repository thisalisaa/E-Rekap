<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan akun KPU
        User::create([
            'name' => 'KPU Admin',
            'email' => 'kpu@example.com',
            'password' => Hash::make('password123'), // Gunakan password yang aman
            'role' => 'kpu',
            'activation_code' => null, // KPU tidak memerlukan kode aktivasi
        ]);

        // Tambahkan beberapa akun KPPS
        User::create([
            'name' => 'KPPS 1',
            'email' => 'kpps1@example.com',
            'password' => Hash::make('password123'), // Gunakan password yang aman
            'role' => 'kpps',
            'activation_code' => Str::random(10),
        ]);

        User::create([
            'name' => 'KPPS 2',
            'email' => 'kpps2@example.com',
            'password' => Hash::make('password123'), // Gunakan password yang aman
            'role' => 'kpps',
            'activation_code' => Str::random(10),
        ]);

        // Tambahkan lebih banyak akun KPPS sesuai kebutuhan
    }
}
