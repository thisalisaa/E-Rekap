<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ActivationMail;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Menampilkan daftar pengguna dengan pagination
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.pengguna.index', compact('users'));
    }

    // Menampilkan form untuk menambah pengguna baru
    public function create()
    {
        $tpsList = Tps::all();

        return view('admin.pengguna.create', compact('tpsList'));
    }

    // Menyimpan pengguna baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:kpps,kpu',
            // Tambahkan validasi TPS jika diperlukan
            'tps_id' => 'nullable|exists:tps,id',
        ]);

        $activationCode = Str::random(10);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make('defaultpassword'), // Password default, sebaiknya ganti di aktivasi
            'role' => $validated['role'],
            'activation_code' => $activationCode,
            'tps_id' => $request->tps_id, // Menyimpan TPS jika ada
        ]);

        Mail::to($user->email)->send(new ActivationMail($user));

        return redirect()->route('admin.pengguna.index')->with('success', 'Akun berhasil dibuat dan kode aktivasi telah dikirimkan.');
    }

    // Menampilkan form untuk mengedit data pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.edit', compact('user'));
    }

    // Memperbarui data pengguna di database
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:kpps,kpu',
            // Tambahkan validasi TPS jika diperlukan
            'tps_id' => 'nullable|exists:tps,id',
        ]);

        $user->update($validated);

        return redirect()->route('admin.pengguna.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna dari database
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    // Menampilkan data pengguna dengan peran KPU
    public function dataKPU()
    {
        $users = User::where('role', 'kpu')->paginate(10);
        return view('admin.pengguna.kpu', compact('users'));
    }

    // Menampilkan data pengguna dengan peran KPPS
    public function dataKPPS()
    {
        $users = User::where('role', 'kpps')->paginate(10);
        return view('admin.pengguna.kpps', compact('users'));
    }
}
