@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Edit Dosen {{ $dosen->nama }}</h1>
</div>

<form action="{{ route('dosens.update', ['dosen' => $dosen->id]) }}" method="post">
    @method('PATCH')
    @include('dosens.form', ['tombol' => 'Ubah'])
</form>
@endsection
