@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5" id="judul">Data Mahasiswa {{ $nama_jurusan ?? 'Universitas ILKOOM' }}</h1>

<div class="text-end pt-5 pb-4">
    @auth
        <a href="{{ route('mahasiswas.create') }}" class="btn btn-info">Tambah Mahasiswa</a>
    @endauth
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Jurusan Mahasiswa</th>
            @auth
                <th>Action</th>
            @endauth
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $mahasiswa)
        <tr id="row-{{ $mahasiswa->id }}">
            <th>{{ $mahasiswas->firstItem() + $loop->iteration - 1 }}</th>
            <td>{{ $mahasiswa->NIM }}</td>
            <td>
                <a href="{{ route('mahasiswas.show', ['mahasiswa' => $mahasiswa->id]) }}">{{ $mahasiswa->nama }}</a>
            </td>
            <td>{{ $mahasiswa->jurusan->nama }}</td>
            @auth
                <td>
                    <a href="{{ route('mahasiswas.edit', ['mahasiswa' => $mahasiswa->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('mahasiswas.destroy', ['mahasiswa' => $mahasiswa->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-hapus shadow-none" data-name="{{ $mahasiswa->nama }}" data-table="mahasiswa" title="Hapus Mahasiswa">
                            Hapus
                        </button>
                    </form>
                </td>
            @endauth
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="mx-auto mt-3">
        {{ $mahasiswas->fragment('judul')->links() }}
        {{-- {{ $dosens->links() }} --}}
    </div>
</div>
@endsection
