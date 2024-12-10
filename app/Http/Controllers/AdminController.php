<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationMail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // Membuat akun KPPS
    // public function createKPPS(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         // Informasi lain seperti TPS bisa ditambahkan di sini
    //     ]);

    //     // Generate kode aktivasi
    //     $activationCode = Str::random(10);

    //     // Buat user KPPS
    //     $user = User::create([
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'password' => bcrypt('defaultpassword'), // Password default
    //         'role' => 'kpps',
    //         'activation_code' => $activationCode,
    //     ]);

    //     // Kirim email aktivasi
    //     Mail::to($user->email)->send(new ActivationMail($user));

    //     return redirect()->back()->with('success', 'Akun KPPS berhasil dibuat dan kode aktivasi telah dikirimkan.');
    // }

    public function dashboard()
    {
        return view('layouts.admin'); // Mengarahkan ke halaman dashboard admin
    }

    public function kppsIndex()
    {
        return view('admin.kpps.index'); // Mengarahkan ke halaman KPPS
    }
}
