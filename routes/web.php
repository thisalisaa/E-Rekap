<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Update jika Anda menggunakan AuthenticatedSessionController
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KPPSController;
use App\Http\Controllers\Admin\TpsController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Admin\KaderController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\HasilPemilihanController;
use App\Http\Controllers\Admin\DashboardAdminController;



// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rute untuk dashboard pengguna yang terautentikasi dan terverifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    // Rute profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk aktivasi akun
Route::get('activation', [AuthenticatedSessionController::class, 'showActivationForm'])->name('activation.form');
Route::post('activation', [AuthenticatedSessionController::class, 'activateAccount'])->name('activation.submit');

// Rute untuk admin (KPU) yang memerlukan middleware 'role:kpu'
Route::middleware(['auth', 'role:kpu'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Rute untuk KPPS yang memerlukan middleware 'role:kpps'
Route::middleware(['auth', 'role:kpps'])->group(function () {
    Route::get('/kpps/dashboard', [KPPSController::class, 'dashboard'])->name('kpps.dashboard');
});

Route::get('/kpu/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/kpps', [AdminController::class, 'kppsIndex'])->name('admin.kpps.index');



    // Route::get('/tps', [TpsController::class, 'index'])->name('admin.tps.index');
    // Route::get('/tps/create', [TpsController::class, 'create'])->name('admin.tps.create');
    // Route::post('/tps', [TpsController::class, 'store'])->name('admin.tps.store');
    // Route::get('/tps/{id}/edit', [TpsController::class, 'edit'])->name('admin.tps.edit');
    // Route::put('/tps/{id}', [TpsController::class, 'update'])->name('admin.tps.update');
    // Route::delete('/tps/{id}', [TpsController::class, 'destroy'])->name('admin.tps.destroy');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('tps', [TpsController::class, 'index'])->name('tps.index');
        Route::get('tps/create', [TpsController::class, 'create'])->name('tps.create');
        Route::post('tps', [TpsController::class, 'store'])->name('tps.store');
        Route::get('tps/{id}/edit', [TpsController::class, 'edit'])->name('tps.edit');
        Route::put('tps/{id}', [TpsController::class, 'update'])->name('tps.update');
        Route::delete('tps/{id}', [TpsController::class, 'destroy'])->name('tps.destroy');
    });
    
   


// Route::get('tps', [TpsController::class, 'index'])->name('admin.tps.index');
// Route::get('tps/create', [TpsController::class, 'create'])->name('admin.tps.create');
// Route::post('tps', [TpsController::class, 'store'])->name('admin.tps.store');
// Route::get('tps/{id}/edit', [TpsController::class, 'edit'])->name('admin.tps.edit');
// Route::put('tps/{id}', [TpsController::class, 'update'])->name('admin.tps.update');
// Route::delete('tps/{id}', [TpsController::class, 'destroy'])->name('admin.tps.destroy');

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ActivationController;

// Routes for Admin User Management
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('admin/pengguna/create-kpps', [UserController::class, 'createKPPS'])->name('admin.create.kpps');
});

// Routes for Activation
Route::middleware('auth')->group(function () {
    Route::get('admin/pengguna/activation', [ActivationController::class, 'showForm'])->name('admin.activation.form');
    Route::post('admin/pengguna/activation', [ActivationController::class, 'activate'])->name('admin.activation.activate');
});




    Route::get('admin/pengguna', [UserController::class, 'index'])->name('admin.pengguna.index');
    Route::get('admin/pengguna/create', [UserController::class, 'create'])->name('admin.pengguna.create');
    Route::post('admin/pengguna', [UserController::class, 'store'])->name('admin.pengguna.store');
    Route::get('admin/pengguna/{user}/edit', [UserController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('admin/pengguna/{user}', [UserController::class, 'update'])->name('admin.pengguna.update');
    Route::delete('admin/pengguna/{user}', [UserController::class, 'destroy'])->name('admin.pengguna.destroy');
    Route::get('admin/pengguna/kpu', [UserController::class, 'dataKPU'])->name('admin.pengguna.kpu');
    Route::get('admin/pengguna/kpps', [UserController::class, 'dataKPPS'])->name('admin.pengguna.kpps');
    
    use App\Http\Controllers\Admin\KandidatController;

    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
    });
    



use App\Http\Controllers\Admin\PemilihController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/pemilih', [PemilihController::class, 'index'])->name('pemilih.index');
});

use App\Http\Controllers\Admin\HadirController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/hadir', [HadirController::class, 'index'])->name('hadir.index');
});

use App\Http\Controllers\Admin\LaporanController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});






// Grouping routes under 'admin' prefix
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    // Route untuk menampilkan daftar kader
    Route::get('/kaders', [KaderController::class, 'index'])->name('kaders.index');

    // Route untuk menampilkan form tambah kader
    Route::get('/kaders/create', [KaderController::class, 'create'])->name('kaders.create');

    // Route untuk menyimpan data kader yang baru ditambahkan
    Route::post('/kaders', [KaderController::class, 'store'])->name('kaders.store');

    // Route untuk menampilkan detail kader tertentu
    Route::get('/kaders/{kader}', [KaderController::class, 'show'])->name('kaders.show');

    // Route untuk menampilkan form edit kader
    Route::get('/kaders/{kader}/edit', [KaderController::class, 'edit'])->name('kaders.edit');

    // Route untuk memperbarui data kader yang sudah ada
    Route::put('/kaders/{kader}', [KaderController::class, 'update'])->name('kaders.update');

    // Route untuk menghapus data kader
    Route::delete('/kaders/{kader}', [KaderController::class, 'destroy'])->name('kaders.destroy');
});

// routes/web.php


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    // Rute lainnya
});


use App\Http\Controllers\Admin\WilayahController;

Route::get('kabupatens/{provinsi_id}', [WilayahController::class, 'getKabupaten']);
Route::get('kecamatans/{kabupaten_id}', [WilayahController::class, 'getKecamatan']);
Route::get('kelurahans/{kecamatan_id}', [WilayahController::class, 'getKelurahan']);

use App\Http\Controllers\Admin\VerifikasiHasilPemiluController;


    Route::get('/verifikasi/hasil-pemilu', [VerifikasiHasilPemiluController::class, 'index'])->name('verifikasi.hasil_pemilu.index');
    Route::post('/verifikasi/hasil-pemilu/{id}', [VerifikasiHasilPemiluController::class, 'verifikasi'])->name('verifikasi.hasil_pemilu');


// Routes untuk dashboard pengguna
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');

    // Manajemen Data TPS
    Route::get('/tps', [TpsController::class, 'index'])->name('user.tps.index');

// User Routes
Route::get('/hasil-pemilihan/create', [HasilPemilihanController::class, 'create'])->name('user.hasil_pemilihan.create');
Route::post('/hasil-pemilihan/store', [HasilPemilihanController::class, 'store'])->name('user.hasil_pemilihan.store');
Route::get('/hasil-pemilihan/upload/{saksi}', [HasilPemilihanController::class, 'uploadForm'])->name('user.hasil_pemilihan.upload_form');
Route::post('/hasil-pemilihan/upload', [HasilPemilihanController::class, 'upload'])->name('user.hasil_pemilihan.upload');
Route::get('/hasil-pemilihan', [HasilPemilihanController::class, 'index'])->name('user.hasil_pemilihan.index');
Route::delete('/hasil-pemilihan/{id}', [HasilPemilihanController::class, 'destroy'])->name('user.hasil_pemilihan.destroy');
Route::delete('/hasil-pemilihan/show', [HasilPemilihanController::class, 'show'])->name('user.hasil_pemilihan.show');


// Admin Routes
Route::get('/admin/hasil-pemilihan', [HasilPemilihanController::class, 'hasilpemilihan'])->name('admin.hasil_pemilihan.index');

Route::get('/admin/hasil-pemilihan/verifikasi/{id}', [HasilPemilihanController::class, 'verifikasi'])->name('admin.hasil_pemilihan.verifikasi');



      
    
});




Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
});


// Include additional authentication routes if needed
require __DIR__.'/auth.php';
