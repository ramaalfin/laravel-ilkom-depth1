<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('matakuliahs.index', [
            'matakuliahs' => Matakuliah::with(['jurusan', 'dosen'])->orderByDesc('created_at')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliahs.create', [
            'jurusans' => Jurusan::orderBy('nama')->get(),
            'dosens' => Dosen::orderBy('nama')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|alpha_num|size:5|unique:matakuliahs,kode',
            'nama' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'dosen_id' => 'required|exists:dosens,id',
            'jumlah_sks' => 'required|digits_between:1,6'
        ]);
        Matakuliah::create($validated);
        Alert::success('Berhasil', "Mata Kuliah $request->nama berhasil ditambahkan");
        return redirect('/matakuliahs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliahs.show', [
            'matakuliah' => $matakuliah,
            'mahasiswas' => $matakuliah->mahasiswas->sortBy('nama'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        //
    }
}
