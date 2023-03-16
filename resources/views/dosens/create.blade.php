@extends('layouts.app')
@section('content')

<div class="pt-3">
    <h1>Form Tambah Dosen</h1>
</div>

<hr>

<form action="{{ route('dosens.store') }}" method="post">
    @include('dosens.form', ['tombol' => 'Tambah'])
</form>
@endsection
