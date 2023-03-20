@extends('layouts.app')
@section('content')
    <div class="pt-3">
        <h1 class="h2">Biodata Dosen</h1>
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
