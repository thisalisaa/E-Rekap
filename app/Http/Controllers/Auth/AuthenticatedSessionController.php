<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Regenerasi session
        $request->session()->regenerate();

        $user = Auth::user();

        // Cek jika user KPPS membutuhkan aktivasi
        if ($user->role === 'kpps' && $user->activation_code) {
            return redirect()->route('activation.form');
        }

        // Redirect sesuai peran
        if ($user->role === 'kpu') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'kpps') {
            return redirect()->route('kpps.dashboard');
        }

        // Default redirect jika peran tidak sesuai
        return redirect()->route('home');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function showActivationForm(): View
    {
        return view('auth.activation');
    }

    public function activateAccount(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'activation_code' => 'required|string',
        ]);

        if ($request->input('activation_code') === $user->activation_code) {
            $user->activation_code = null;
            $user->save();

            return redirect()->route('kpps.dashboard')->with('status', 'Account activated successfully.');
        }

        return redirect()->back()->withErrors(['activation_code' => 'Invalid activation code']);
    }
}
