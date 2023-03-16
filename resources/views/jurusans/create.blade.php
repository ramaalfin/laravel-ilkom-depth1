@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Tambah Jurusan</h1>
</div>

<hr>

<form action="{{ route('jurusans.store') }}" method="POST">
    @include('jurusans.form', ['tombol' => 'Tambah'])
</form>
@endsection
