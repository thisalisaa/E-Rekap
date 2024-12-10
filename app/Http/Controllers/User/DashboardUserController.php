<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tps; 
use App\Models\HasilPemilihan; 
use App\Models\User;

class DashboardUserController extends Controller
{
    public function index()
    {
    $tps = auth()->user()->tps; // Menyesuaikan dengan hubungan atau cara Anda mendapatkan data TPS
    $hasilPemilihanCount = HasilPemilihan::count(); // Jumlah hasil pemilihan yang diunggah
    $hasilPemilihanTerverifikasiCount = HasilPemilihan::where('status', 'terverifikasi')->count(); // Jumlah hasil pemilihan terverifikasi

    return view('user.dashboard.index', compact('tps', 'hasilPemilihanCount', 'hasilPemilihanTerverifikasiCount'));
    }



    // Tambahkan metode lain sesuai kebutuhan
}
