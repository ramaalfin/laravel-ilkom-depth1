<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswas.index', [
            'mahasiswas' => Mahasiswa::with('jurusan')->orderByDesc('created_at')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create', [
            'jurusans' => Jurusan::orderBy('nama')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIM' => "required|size:8|alpha_num|unique:mahasiswas,NIM",
            'nama' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id'
        ]);

        //todo Cek Daya Tampung
        $daya_tampung = Jurusan::find($request->jurusan_id)->daya_tampung; //*Ambil daya tampung dari jurusan yang dipilih
        $total_mahasiswa = Mahasiswa::where('jurusan_id', $request->jurusan_id)->count(); //*Ambil total mahasiswa dari jurusan yang dipilih
        if ($total_mahasiswa >= $daya_tampung) {
            Alert::error('Pendaftaran Gagal', 'Sudah melebihi daya tampung');
            return back()->withInput();
        }
        Mahasiswa::create($validated);
        Alert::success('Berhasil', "Data Mahasiswa $request->nama berhasil ditambahkan");
        return redirect('/mahasiswas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.show', [
            'mahasiswa' => $mahasiswa,
            'matakuliahs' => $mahasiswa->matakuliahs->sortBy('nama')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
