@extends('layouts.app')
@section('content')
    <div class="pt-3">
        <h1 class="h2">Informasi Mata Kuliah</h1>
    </div>
    <hr>
    <ul>
        <li>Nama : {{ $matakuliah->nama }}</li>
        <li>Kode Mata Kuliah : {{ $matakuliah->kode }}</li>
        <li>Dosen Pengajar : <a href="{{ route('dosens.show', ['dosen' => $matakuliah->dosen->id]) }}">{{ $matakuliah->dosen->nama }}</a></li>
        <li>Jurusan : {{ $matakuliah->jurusan->nama }}</li>
        <li>Jumlah SKS : {{ $matakuliah->jumlah_sks }}</li>
        <li>Total Mahasiswa : {{ count($mahasiswas) }}</li>
    </ul>
    <p>Daftar Mahasiswa:</p>
    <ol>
        @foreach ($matakuliah->mahasiswas as $mahasiswa)
            <li>{{ $mahasiswa->nama }} (<a href="{{ route('mahasiswas.show', ['mahasiswa' => $mahasiswa->id]) }}">{{ $mahasiswa->NIM }}</a>)</li>
        @endforeach
    </ol>
    <div class="text-start pt-5 pb-4">
        @auth
            <a href="{{ route('daftarkan-matakuliah', ['matakuliah' => $matakuliah->id]) }}" class="btn btn-info">Daftarkan Mahasiswa</a>
        @endauth
    </div>
@endsection
