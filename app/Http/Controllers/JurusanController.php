<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use mysqli;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('jurusans.create'); //todo memanggil view create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'kepala_jurusan' => 'required',
            'daya_tampung' => 'required'
        ]);
        $jurusan = Jurusan::create($validate); //*ELOQUENT untuk mass assignment
        Alert::success('Berhasil', "Jurusan $request->nama berhasil dibuat");
        return redirect("/jurusans#card-{$jurusan->id}");
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
        return view('jurusans.edit', ['jurusan' => $jurusan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kepala_jurusan' => 'required',
            'daya_tampung' => 'required|min:10|integer'
        ]);
        $jurusan->update($validated);
        Alert::success('Berhasil', "Data Jurusan $request->nama berhasil diubah");
        // return redirect('/jurusans');
        return redirect("/jurusans#card-{$jurusan->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        Alert::success('Berhasil', "Jurusan $jurusan->nama berhasil dihapus");
        return redirect('/jurusans');
    }
}
