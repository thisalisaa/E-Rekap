<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tps;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class TpsController extends Controller
{
    // Menampilkan daftar TPS
    public function index()
    {
        $tps = Tps::paginate(10); // Mengambil 10 data per halaman
        return view('admin.tps.index', compact('tps'));
    }

    // Menampilkan form untuk membuat TPS baru
    public function create()
    {
        // Mendapatkan data provinsi, kabupaten, kecamatan, dan kelurahan untuk dropdown
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();

        return view('admin.tps.create', compact('provinsis', 'kabupatens', 'kecamatans', 'kelurahans'));
    }

    // Menyimpan TPS baru ke database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|unique:tps,code|max:255',
        'rt' => 'required|string|max:10',
        'rw' => 'required|string|max:10',
        'kelurahan_id' => 'required|exists:kelurahans,id',
        'kecamatan_id' => 'required|exists:kecamatans,id',
        'kabupaten_id' => 'required|exists:kabupatens,id',
        'provinsi_id' => 'required|exists:provinsis,id',
    ]);

    // Sesuaikan penyimpanan data sesuai kebutuhan
    Tps::create([
        'name' => $request->name,
        'code' => $request->code,
        'rt' => $request->rt,
        'rw' => $request->rw,
        'kelurahan' => Kelurahan::find($request->kelurahan_id)->nama,
        'kecamatan' => Kecamatan::find($request->kecamatan_id)->nama,
        'kota_kabupaten' => Kabupaten::find($request->kabupaten_id)->nama,
        'provinsi' => Provinsi::find($request->provinsi_id)->nama,
    ]);

    return redirect()->route('admin.tps.index')->with('success', 'TPS berhasil ditambahkan.');
}


    // Menampilkan form untuk mengedit TPS
    public function edit($id)
    {
        $tps = Tps::findOrFail($id);
        // Mendapatkan data provinsi, kabupaten, kecamatan, dan kelurahan untuk dropdown
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();

        return view('admin.tps.edit', compact('tps', 'provinsis', 'kabupatens', 'kecamatans', 'kelurahans'));
    }

    // Memperbarui data TPS di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:tps,code,' . $id . '|max:255',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'provinsi_id' => 'required|exists:provinsis,id',
        ]);

        $tps = Tps::findOrFail($id);
        $tps->update($request->all());

        return redirect()->route('admin.tps.index')->with('success', 'TPS berhasil diperbarui.');
    }

    // Menghapus TPS dari database
    public function destroy($id)
    {
        $tps = Tps::findOrFail($id);
        $tps->delete();

        return redirect()->route('admin.tps.index')->with('success', 'TPS berhasil dihapus.');
    }
}
