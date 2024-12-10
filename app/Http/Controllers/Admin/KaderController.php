<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    public function index()
{
    $kaders = Kader::paginate(10); // Adjust the number to paginate as needed.
    return view('admin.kader.index', compact('kaders'));
}


    // KaderController.php
public function create()
{
    $provinsis = Provinsi::all();
    $kabupatens = Kabupaten::all(); // Ambil semua kabupaten
    $kecamatans = Kecamatan::all(); // Ambil semua kecamatan
    $kelurahans = Kelurahan::all(); // Ambil semua kelurahan

    return view('admin.kader.create', [
        'provinsis' => $provinsis,
        'kabupatens' => $kabupatens,
        'kecamatans' => $kecamatans,
        'kelurahans' => $kelurahans
    ]);
}


    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:kaders,nik',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'tps' => 'required',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
           
        ]);

        Kader::create($request->all());

        return redirect()->route('admin.kaders.index')
                         ->with('success', 'Data kader berhasil ditambahkan');
    }

    public function show(Kader $kader)
    {
        return view('admin.kader.show', compact('kader'));
    }

    public function edit(Kader $kader)
    {
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::where('provinsi_id', $kader->provinsi_id)->get();
        $kecamatans = Kecamatan::where('kabupaten_id', $kader->kabupaten_id)->get();
        $kelurahans = Kelurahan::where('kecamatan_id', $kader->kecamatan_id)->get();
        return view('admin.kader.edit', compact('kader', 'provinsis', 'kabupatens', 'kecamatans', 'kelurahans'));
    }

    public function update(Request $request, Kader $kader)
    {
        $request->validate([
            'nik' => 'required|unique:kaders,nik,' . $kader->id,
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'tps' => 'required',
        ]);

        $kader->update($request->all());

        return redirect()->route('admin.kaders.index')
                         ->with('success', 'Data kader berhasil diperbarui');
    }

    public function destroy(Kader $kader)
    {
        $kader->delete();
        return redirect()->route('admin.kaders.index')
                         ->with('success', 'Data kader berhasil dihapus');
    }
}
