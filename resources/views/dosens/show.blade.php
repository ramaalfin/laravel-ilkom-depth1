@extends('layouts.app')
@section('content')
    <div class="pt-3 d-flex align-items-center">
        <h1 class="h2 me-4">Biodata Dosen</h1>
        @auth
            <a href="{{ route('dosens.edit', ['dosen' => $dosen->id]) }}" class="btn btn-primary me-1">Edit</a>
            <form action="{{ route('dosens.destroy', ['dosen' => $dosen->id]) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-hapus shadow-none" data-name="{{ $dosen->nama }}"
                    data-table="dosen">
                    Hapus
                </button>
            </form>
        @endauth
    </div>
    <hr>
    <ul>
        <li>Nama: <strong>{{ $dosen->nama }} </strong></li>
        <li>Nomor Induk Dosen: <strong>{{ $dosen->NID }} </strong></li>
        <li>Jurusan: <strong>{{ $dosen->jurusan->nama }} </strong></li>
    </ul>
    <p>Mengajar Mata Kuliah:</p>
    <ol>
        @foreach ($dosen->matakuliahs as $matakuliah)
            <li>
                {{ $matakuliah->nama }}
                <small>
                    (<a
                        href="{{ route('matakuliahs.show', ['matakuliah' => $matakuliah->id]) }}">{{ $matakuliah->kode }}</a>
                    - {{ $matakuliah->jumlah_sks }} SKS)
                </small>
            </li>
        @endforeach
    </ol>

    <div class="text-start pt-5 pb-4">
        @auth
            <a href="{{ route('buat-matakuliah', ['dosen_id' => $dosen->id]) }}" class="btn btn-info">Tambahkan Mata Kuliah</a>
        @endauth
    </div>
@endsection
