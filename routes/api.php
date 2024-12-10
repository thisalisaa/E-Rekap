<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WilayahController;

Route::get('kabupatens/{provinsi_id}', [WilayahController::class, 'getKabupaten']);
Route::get('kecamatans/{kabupaten_id}', [WilayahController::class, 'getKecamatan']);
Route::get('kelurahans/{kecamatan_id}', [WilayahController::class, 'getKelurahan']);

