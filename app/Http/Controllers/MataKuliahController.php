<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
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
            'matakuliahs' => Matakuliah::with(['jurusan', 'dosen'])->orderBy('nama')->paginate(10)
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

    public function buatMatakuliah(Dosen $dosen_id)
    {
        return view('matakuliahs.create', [
            'jurusans' => Jurusan::where('id', $dosen_id->jurusan->id)->get(),
            'dosen_id' => $dosen_id
        ]);
    }

    public function daftarkanMatakuliah(Matakuliah $matakuliah)
    {
        return view('matakuliahs.daftarkan-matakuliah', [
            'matakuliah' => $matakuliah,
            'mahasiswas' => Mahasiswa::where('jurusan_id', $matakuliah->jurusan_id)->orderBy('nama')->get(), // Ambil semua daftar mahasiswa dari jurusan yang sama dengan mata kuliah
            'mahasiswas_sudah_terdaftar' => $matakuliah->mahasiswas->pluck('id')->all() // Buat array dari daftar mahasiswa yang sudah terdaftar di mata kuliah
        ]);
    }

    public function prosesDaftarkanMatakuliah(Request $request, Matakuliah $matakuliah)
    {
        //todo Ambil semua id mahasiswa dari jurusan yang sama dengan mata kuliah
        $mahasiswa_jurusan = Mahasiswa::where('jurusan_id', $matakuliah->jurusan_id)->pluck('id')->toArray();
        $validated = $request->validate([
            'mahasiswa.*' => 'distinct|in:'.implode(',', $mahasiswa_jurusan),
        ]);

        // todo Insert ke DB
        $matakuliah->mahasiswas()->sync($validated['mahasiswa'] ?? []);
        Alert::success('Berhasil', "Terdapat " . count($validated['mahasiswa'] ?? []) . " mahasiswa yang terdaftar");
        return redirect(route('matakuliahs.show', ['matakuliah' => $matakuliah->id]));
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
        return view('matakuliahs.edit', [
            'matakuliah' => $matakuliah,
            'jurusans' => Jurusan::orderBy('nama')->get(),
            'dosens' => Dosen::orderBy('nama')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validated = $request->validate([
            'kode' => 'required|alpha_num|size:5|unique:matakuliahs,kode,' . $matakuliah->id,
            'nama' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'dosen_id' => 'required|exists:dosens,id',
            'jumlah_sks' => 'required|digits_between:1,6'
        ]);
        // todo Antisipasi jika ada yg merubah jurusan_id yang sudah ter-hidden
        if (($matakuliah->mahasiswas()->count() > 0) AND ($request->jurusan_id != $matakuliah->jurusan_id)) {
            Alert::error('Gagal', 'Jurusan tidak bisa diubah!');
            return back()->withInput();
        }
        $matakuliah->update($validated);
        Alert::success('Berhasil', "Data Mata Kuliah $request->nama berhasil diubah");
        return redirect($request->url_asal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        Alert::success('Berhasil', "Data $matakuliah->nama berhasil dihapus");
        return redirect('/matakuliahs');
    }
}
