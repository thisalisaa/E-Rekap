<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{
    public function showForm()
    {
        return view('admin.pengguna.activation');
    }

    public function activate(Request $request)
    {
        $request->validate([
            'activation_code' => 'required|string',
        ]);

        $user = Auth::user();

        if ($user->activation_code === $request->activation_code) {
            $user->update([
                'email_verified_at' => now(),
                'activation_code' => null,
            ]);

            return redirect()->route('home')->with('success', 'Akun Anda berhasil diaktivasi.');
        }

        return back()->withErrors(['activation_code' => 'Kode aktivasi tidak valid.']);
    }
}
