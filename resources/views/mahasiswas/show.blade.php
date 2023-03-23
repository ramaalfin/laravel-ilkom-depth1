@extends('layouts.app')
@section('content')
    <div class="pt-3 d-flex align-items-center">
        <h1 class="h2 me-4">Biodata Mahasiswa</h1>
        @auth
            <a href="{{ route('mahasiswas.edit', ['mahasiswa' => $mahasiswa->id]) }}" class="btn btn-primary me-1">Edit</a>
            <form action="{{ route('mahasiswas.destroy', ['mahasiswa' => $mahasiswa->id]) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-hapus shadow-none" data-name="{{ $mahasiswa->nama }}"
                    data-table="mahasiswa">
                    Hapus
                </button>
            </form>
        @endauth
    </div>
    <hr>
    <ul>
        <li>Nama : {{ $mahasiswa->nama }}</li>
        <li>Nomor Induk Mahasiswa : {{ $mahasiswa->NIM }}</li>
        <li>Jurusan : {{ $mahasiswa->jurusan->nama }}</li>
        <li>Total Mata Kuliah : {{ $mahasiswa->matakuliahs->count() }} ({{ $mahasiswa->matakuliahs->sum('jumlah_sks') }} SKS)</li>
    </ul>
    <p>Mengambil Mata Kuliah:</p>
    <ol>
        @foreach ($mahasiswa->matakuliahs as $matakuliah)
            <li>{{ $matakuliah->nama }} (<a href="{{ route('matakuliahs.show', ['matakuliah' => $matakuliah->id]) }}">{{ $matakuliah->kode }}</a> - {{ $matakuliah->jumlah_sks }} SKS)</li>

        @endforeach
    </ol>
    <div class="text-start pt-5 pb-4">
        @auth
            <a href="{{ route('ambil-matakuliah', ['mahasiswa' => $mahasiswa->id]) }}" class="btn btn-info">Ambil Mata Kuliah</a>
        @endauth
    </div>
@endsection
