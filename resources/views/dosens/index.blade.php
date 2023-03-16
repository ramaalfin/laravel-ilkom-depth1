@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5" id="judul">Data Dosen {{ $nama_jurusan ?? 'Universitas ILKOOM' }}</h1>

<div class="text-end pt-5 pb-4">
    @auth
        <a href="{{ route('dosens.create') }}" class="btn btn-info">Tambah Dosen</a>
    @endauth
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>NID</th>
            <th>Nama Dosen</th>
            <th>Jurusan Dosen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dosens as $dosen)
        <tr>
            <th>{{ $dosens->firstItem() + $loop->iteration - 1 }}</th>
            <td>{{ $dosen->NID }}</td>
            <td>
                <a href="{{ route('dosens.show', ['dosen' => $dosen->id]) }}">{{ $dosen->nama }}</a>
            </td>
            <td>{{ $dosen->jurusan->nama }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="mx-auto mt-3">
        {{ $dosens->fragment('judul')->links() }}
        {{-- {{ $dosens->links() }} --}}
    </div>
</div>
@endsection
