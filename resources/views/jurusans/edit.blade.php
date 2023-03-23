@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Edit Jurusan {{ $jurusan->nama }}</h1>
</div>

<form action="{{ route('jurusans.update', ['jurusan' => $jurusan->id]) }}" method="post">
    @method('PATCH')
    @include('jurusans.form', ['tombol' => 'Ubah'])
</form>
@endsection
