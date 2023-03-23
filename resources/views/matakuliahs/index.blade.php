@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5" id="judul">Data Mata Kuliah {{ $nama_jurusan ?? 'Universitas ILKOOM' }}</h1>

<div class="text-end pt-5 pb-4">
    @auth
        <a href="{{ route('matakuliahs.create') }}" class="btn btn-info">Tambah Mata Kuliah</a>
    @endauth
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>Dosen Pengajar</th>
            <th>Jumlah SKS</th>
            <th>Jurusan</th>
            @auth
                <th>Action</th>
            @endauth
        </tr>
    </thead>
    <tbody>
        @foreach ($matakuliahs as $matakuliah)
        <tr id="row-{{ $matakuliah->id }}">
            <th>{{ $matakuliahs->firstItem() + $loop->iteration - 1 }}</th>
            <td>{{ $matakuliah->kode }}</td>
            <td>
                <a href="{{ route('matakuliahs.show', ['matakuliah' => $matakuliah->id]) }}">{{ $matakuliah->nama }}</a>
            </td>
            <td>
                <a href="{{ route('dosens.show', ['dosen' => $matakuliah->dosen->id]) }}">{{ $matakuliah->dosen->nama }}</a>

            </td>
            <td>{{ $matakuliah->jumlah_sks }}</td>
            <td>{{ $matakuliah->jurusan->nama }}</td>
            @auth
                <td>
                    <a href="{{ route('matakuliahs.edit', ['matakuliah' => $matakuliah->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('matakuliahs.destroy', ['matakuliah' => $matakuliah->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-hapus shadow-none" data-name="{{ $matakuliah->nama }}" data-table="matakuliah">
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
        {{ $matakuliahs->fragment('judul')->links() }}
        {{-- {{ $dosens->links() }} --}}
    </div>
</div>
@endsection
