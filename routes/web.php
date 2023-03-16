<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [JurusanController::class, 'index']);

Route::resource('jurusans', JurusanController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('dosens', DosenController::class);
Route::resource('matakuliahs', MatakuliahController::class);

Route::get('/jurusan-dosen/{jurusan_id}', [JurusanController::class, 'jurusanDosen'])->name('jurusan-dosen');
Route::get('/jurusan-mahasiswa/{jurusan_id}', [JurusanController::class, 'jurusanMahasiswa'])->name('jurusan-mahasiswa');
Route::get('/jurusan-matakuliah/{jurusan_id}', [JurusanController::class, 'jurusanMatakuliah'])->name('jurusan-matakuliah');

Auth::routes();

Route::get('/home', [JurusanController::class, 'index'])->name('home');
