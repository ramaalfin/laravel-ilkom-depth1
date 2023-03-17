@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Tambah Mahasiswa</h1>
</div>

<hr>

<form action="{{ route('mahasiswas.store') }}" method="post">
    @include('mahasiswas.form', ['tombol' => 'Tambah'])
</form>
@endsection
