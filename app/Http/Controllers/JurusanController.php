<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use mysqli;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jurusans.index', [
            'jurusans' => Jurusan::withCount('mahasiswas')->orderBy('nama')->get() //menghitung total mahasiswa
        ]);
    }

    public function jurusanDosen($jurusan_id) //MENAMPUNG JURUSAN ID DARI ROUTES
    {
        return view('dosens.index', [
            'dosens' => Dosen::where('jurusan_id', $jurusan_id)->orderBy('nama')->paginate(10), //MENGAMBIL DATA JURUSAN ID DOSEN == JURUSAN ID DI TABLE JURUSAN
            'nama_jurusan' => Jurusan::find($jurusan_id)->nama, //MENCARI NAMA JURUSAN BERDASARKAN JURUSAN ID MENGHASILKAN STRING
        ]);
    }

    public function jurusanMahasiswa($jurusan_id) //MENAMPUNG JURUSAN ID DARI ROUTES
    {
        return view('mahasiswas.index', [
            'mahasiswas' => Mahasiswa::where('jurusan_id', $jurusan_id)->orderBy('nama')->paginate(10), //MENGAMBIL DATA JURUSAN ID Mahasiswa == JURUSAN ID DI TABLE JURUSAN
            'nama_jurusan' => Jurusan::find($jurusan_id)->nama, //MENCARI NAMA JURUSAN BERDASARKAN JURUSAN ID MENGHASILKAN STRING
        ]);
    }

    public function jurusanMatakuliah($jurusan_id) //MENAMPUNG JURUSAN ID DARI ROUTES
    {
        return view('matakuliahs.index', [
            'matakuliahs' => MataKuliah::where('jurusan_id', $jurusan_id)->orderBy('nama')->paginate(10), //MENGAMBIL DATA JURUSAN ID Matakuliah == JURUSAN ID DI TABLE JURUSAN
            'nama_jurusan' => Jurusan::find($jurusan_id)->nama, //MENCARI NAMA JURUSAN BERDASARKAN JURUSAN ID MENGHASILKAN STRING
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        //
    }
}
