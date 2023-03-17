@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Tambah Mahasiswa</h1>
</div>

<hr>

<form action="{{ route('matakuliahs.store') }}" method="post">
    @include('matakuliahs.form', ['tombol' => 'Tambah'])
</form>
@endsection
