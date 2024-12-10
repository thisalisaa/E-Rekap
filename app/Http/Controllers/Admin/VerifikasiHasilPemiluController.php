<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilPemilu;

class VerifikasiHasilPemiluController extends Controller
{
    public function index()
    {
        $hasilPemilu = HasilPemilu::with('tps', 'user')
            ->get();


        return view('admin.verifikasi_hasil_pemilu.index', compact('hasilPemilu'));
    }

    public function verifikasi(Request $request, $id)
    {
        $hasilPemilu = HasilPemilu::findOrFail($id);
        $hasilPemilu->status_verifikasi = 'terverifikasi';
        $hasilPemilu->save();

        return redirect()->route('verifikasi.hasil_pemilu.index')
            ->with('success', 'Hasil pemilu telah diverifikasi.');
    }
}
