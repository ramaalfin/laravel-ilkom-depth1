@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Sistem Informasi Universitas ILKOOM</h1>

<div class="row cols-1 row-cols md-2 cols-xl-3 g-4">
    @foreach ($jurusans as $jurusan)
        
    <div class="col">
        <div class="card h-100">
            <div class="card-body text-center">
                <h3 class="card-title py-1">{{ $jurusan->nama }}</h3>
                <hr>
                <div class="card-text py-1">
                    Kepala Jurusan : <b>{{ $jurusan->kepala_jurusan }}</b>
                </div>
                <div class="card-text pb-4">
                    Total Mahasiswa : {{ $jurusan->mahasiswas_count }} (daya tampung {{ $jurusan->daya_tampung }})
                </div>
                <a href="{{ route('jurusan-dosen', ['jurusan_id' => $jurusan->id]) }}" class="btn btn-info d-block mb-2">Dosen</a>
                <a href="{{ route('jurusan-mahasiswa', ['jurusan_id' => $jurusan->id]) }}" class="btn btn-warning d-block">Mahasiswa</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection