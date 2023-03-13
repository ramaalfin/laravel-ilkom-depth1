<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('jurusans', JurusanController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('dosens', DosenController::class);
Route::resource('matakuliahs', MataKuliahController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
