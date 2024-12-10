<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getKabupaten($provinsiId)
    {
        $kabupatens = Kabupaten::where('provinsi_id', $provinsiId)->get();
        return response()->json($kabupatens);
    }

    public function getKecamatan($kabupatenId)
    {
        $kecamatans = Kecamatan::where('kabupaten_id', $kabupatenId)->get();
        return response()->json($kecamatans);
    }

    public function getKelurahan($kecamatanId)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatanId)->get();
        return response()->json($kelurahans);
    }
}
