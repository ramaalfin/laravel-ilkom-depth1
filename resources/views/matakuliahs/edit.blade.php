@extends('layouts.app')
@section('content')
    <div class="pt-3">
        <h1>Edit Data Mata Kuliah {{ $matakuliah->nama }}</h1>
    </div>

    <form action="{{ route('matakuliahs.update', ['matakuliah' => $matakuliah->id]) }}" method="post">
        @method('PATCH')
        @include('matakuliahs.form', ['tombol' => 'Ubah'])
    </form>
@endsection
