@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Edit Data Mahasiswa {{ $mahasiswa->nama }}</h1>
</div>

<form action="{{ route('mahasiswas.update', ['mahasiswa' => $mahasiswa->id]) }}" method="post">
    @method('PATCH')
    @include('mahasiswas.form', ['tombol' => 'Ubah'])
</form>
@endsection
