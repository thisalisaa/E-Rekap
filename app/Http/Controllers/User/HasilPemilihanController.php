<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilPemilihan;
use App\Models\Saksi;
use App\Models\Kader;
use Illuminate\Support\Facades\Log;

class HasilPemilihanController extends Controller
{
    public function create()
    {
        $kaders = Kader::all(); // Mengambil semua data kader
        return view('user.hasil_pemilihan.create', compact('kaders'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama.*' => 'required|string|max:255',
            'nik.*' => 'required|string|max:20',
            'no_hp.*' => 'required|string|max:15',
            'jenis_pemilihan.*' => 'required|in:presiden_wakil_presiden,dpr,dpd,dprd,gubernur,wali_kota,kepala_desa',
            'kader_id.*' => 'required|exists:kaders,id',
            'nama_pasang_kandidat.*' => 'required|string|max:255',
            'jenis_pemeriksa.*' => 'nullable|string|max:255',
            'jenis_saksi.*' => 'nullable|string|max:255',
        ]);
    
        // Simpan data saksi dan ambil ID terakhir yang disimpan
        $saksiIds = [];
        foreach ($request->nama as $index => $nama) {
            $saksi = Saksi::create([
                'nama' => $nama,
                'nik' => $request->nik[$index],
                'no_hp' => $request->no_hp[$index],
                'jenis_pemilihan' => $request->jenis_pemilihan[$index],
                'kader_id' => $request->kader_id[$index],
                'nama_pasang_kandidat' => $request->nama_pasang_kandidat[$index],
                'jenis_pemeriksa' => $request->jenis_pemeriksa[$index] ?? null,
                'jenis_saksi' => $request->jenis_saksi[$index] ?? null,
            ]);
    
            // Menyimpan ID saksi untuk pengalihan
            $saksiIds[] = $saksi->id;
        }
    
        // Jika ada saksi yang disimpan, arahkan ke halaman upload dengan ID saksi pertama
        return redirect()->route('user.hasil_pemilihan.upload_form', ['saksi' => $saksiIds[0]])
            ->with('success', 'Data saksi berhasil disimpan. Silakan unggah hasil pemilihan.');
    }
    
    


    /**
     * Menampilkan form upload hasil pemilihan.
     */
    public function uploadForm($saksiId)
    {
        // Ambil data saksi berdasarkan ID
        $saksi = Saksi::findOrFail($saksiId); // Pastikan ID saksi valid

        // Tampilkan view upload dengan data saksi
        return view('user.hasil_pemilihan.upload', compact('saksi'));
    }

    /**
     * Menyimpan hasil pemilihan yang diunggah.
     */
    public function upload(Request $request)
    {
        // Validasi file dan saksi_id
        $validated = $request->validate([
            'hasil_pemilihan_file' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'saksi_id' => 'required|exists:saksis,id',
        ]);

        $file = $request->file('hasil_pemilihan_file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        // Memindahkan file yang diupload ke direktori 'uploads/hasil_pemilihan'
        if ($file->move(public_path('uploads/hasil_pemilihan'), $fileName)) {
            Log::info('File berhasil diunggah: ' . $fileName);
        } else {
            Log::error('Gagal mengunggah file');
        }

        // Simpan informasi hasil pemilihan ke database
        HasilPemilihan::create([
            'file_name' => $fileName,
            'saksi_id' => $request->saksi_id, // ID saksi dari form
        ]);

        return redirect()->route('user.hasil_pemilihan.index')
            ->with('success', 'Hasil pemilihan berhasil diunggah.');
    }

    /**
     * Menampilkan daftar hasil pemilihan.
     */
    public function index()
    {
        $hasilPemilihan = HasilPemilihan::with('saksi')->get();
        return view('user.hasil_pemilihan.index', compact('hasilPemilihan'));
    }

    public function show($id)
{
    $hasilPemilihan = HasilPemilihan::findOrFail($id);
    return view('user.hasil_pemilihan.show', compact('hasilPemilihan'));
}

public function destroy($id)
{
    $hasilPemilihan = HasilPemilihan::findOrFail($id);
    $hasilPemilihan->delete();

    return redirect()->route('user.hasil_pemilihan.index')
        ->with('success', 'Hasil pemilihan berhasil dihapus.');
}


}
