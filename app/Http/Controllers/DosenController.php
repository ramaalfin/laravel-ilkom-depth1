<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosens.index', [
            'dosens' => Dosen::with('jurusan')->orderBy('nama')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosens.create', [
            'jurusans' => Jurusan::orderBy('nama')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NID' => 'required|alpha_num|size:8|unique:dosens,NID',
            'nama' => "required",
            'jurusan_id' => 'required|exists:jurusans,id' //* set id yang sesuai dengan id di table jurusans
        ]);
        Dosen::create($validated);
        Alert::success('Berhasil', "Data Dosen $request->nama berhasil dibuat");
        // return redirect('/dosens');
        return redirect($request->url_asal); //* $request->url_asal dikirim dari form dosens
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('dosens.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', [
            'dosen' => $dosen,
            'jurusans' => Jurusan::orderBy('nama')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'NID' => 'required|alpha_num|size:8|unique:dosens,NID,'.$dosen->id,
            'nama' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id' //* set id yang sesuai dengan id di table jurusans
        ]);
        $dosen->update($validated);
        Alert::success('Berhasil', "Data Dosen $request->nama berhasil diubah");
        // return redirect('/dosens');
        return redirect($request->url_asal); //* $request->url_asal dikirim dari form dosens
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        //
    }
}
