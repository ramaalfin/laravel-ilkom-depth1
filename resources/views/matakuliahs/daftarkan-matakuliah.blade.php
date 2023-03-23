@extends('layouts.app')
@section('content')
    <div class="mb-3">
        <h3>Daftarkan Mahasiswa ke Mata Kuliah</h3>
    </div>
    <hr>
    <ul>
        <li>Jurusan : <b>{{ $matakuliah->jurusan->nama }}</b></li>
        <li>Jumlah SKS : <b>{{ $matakuliah->jumlah_sks }}</b></li>
        <li>Total Mahasiswa : <b>{{ $matakuliah->mahasiswas->count() }}</b></li>
    </ul>
    <hr>
    <h5>Daftar Mahasiswa {{ $matakuliah->jurusan->nama }} yang mengambil Mata Kuliah {{ $matakuliah->nama }} :</h5>
    <form action="{{ route('proses-daftarkan-matakuliah', $matakuliah->id) }}" method="post">
        @csrf
        <div class="row">
            @error('mahasiswa.*')
                <div class="invalid-feedback my-3 block">
                    <strong>Error: Pilihan mahasiswa ada yang berulang / bukan dari jurusan
                        {{ $matakuliah->jurusan->nama }}</strong>
                </div>
            @enderror

            <div class="col-md-12">
                @foreach ($mahasiswas as $mahasiswa)
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" id="mahasiswa-{{ $mahasiswa->id }}" class="form-check-input" name="mahasiswa[]" value="{{ $mahasiswa->id }}"
                        @if (in_array($mahasiswa->id, old('mahasiswa') ?? ($mahasiswas_sudah_terdaftar ?? [])))     checked
                        @endif
                        >
                        <label for="mahasiswa-{{ $mahasiswa->id }}" class="form-check-label">
                            {{ $mahasiswa->nama }} <small> <a href="{{ route('mahasiswas.show', $mahasiswa->id) }}"> ({{ $mahasiswa->NIM }})</a> </small>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Daftarkan</button>
            </div>
        </div>
    </form>
@endsection
