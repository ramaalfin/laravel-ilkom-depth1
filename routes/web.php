<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PencarianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [JurusanController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::resource('jurusans', JurusanController::class);
    Route::resource('mahasiswas', MahasiswaController::class);
    Route::resource('dosens', DosenController::class);
    Route::resource('matakuliahs', MatakuliahController::class);

    Route::get('/jurusan-dosen/{jurusan_id}', [JurusanController::class, 'jurusanDosen'])->name('jurusan-dosen');
    Route::get('/jurusan-mahasiswa/{jurusan_id}', [JurusanController::class, 'jurusanMahasiswa'])->name('jurusan-mahasiswa');
    Route::get('/jurusan-matakuliah/{jurusan_id}', [JurusanController::class, 'jurusanMatakuliah'])->name('jurusan-matakuliah');

    // ROUTE MEMBUAT MATA KULIAH DARI VIEW SHOW DOSEN
    Route::get('/buat-matakuliah/{dosen_id}', [MatakuliahController::class, 'buatMatakuliah'])->name('buat-matakuliah');

    // ROUTE MENGAMBIL MATA KULIAH DARI VIEW SHOW MAHASISWA
    Route::get('/mahasiswas/ambil-matakuliah/{mahasiswa}', [MahasiswaController::class, 'ambilMatakuliah'])->name('ambil-matakuliah');
    Route::post('/mahasiswas/ambil-matakuliah/{mahasiswa}', [MahasiswaController::class, 'prosesAmbilMatakuliah'])->name('proses-ambil-matakuliah');

    // ROUTE MENDAFTARKAN MAHASISWA DARI VIEW SHOW MATA KULIAH
    Route::get('/matakuliahs/daftarkan-mahasiswa/{matakuliah}', [MatakuliahController::class, 'daftarkanMatakuliah'])->name('daftarkan-matakuliah');
    Route::post('/matakuliahs/daftarkan-mahasiswa/{matakuliah}', [MatakuliahController::class, 'prosesDaftarkanMatakuliah'])->name('proses-daftarkan-matakuliah');

    // ROUTES PENCARIAN
    Route::get('/pencarian', [PencarianController::class, 'index']);
    Route::get('/pencarian/proses', [PencarianController::class, 'proses']);
});

Auth::routes();

Route::get('/home', [JurusanController::class, 'index'])->name('home');
