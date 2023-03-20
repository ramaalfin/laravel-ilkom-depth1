@extends('layouts.app')
@section('content')
    <div class="mb-3">
        <h3>Ambil Mata Kuliah untuk Mahasiswa</h3>
    </div>
    <hr>
    <ul>
        <li>Nama : {{ $mahasiswa->nama }}</li>
        <li>Nomor Induk Mahasiswa : {{ $mahasiswa->NIM }}</li>
        <li>Jurusan : {{ $mahasiswa->jurusan->nama }}</li>
        <li>Total Mata Kuliah : {{ $mahasiswa->matakuliahs->count() }} ({{ $mahasiswa->matakuliahs->sum('jumlah_sks') }}
            SKS)</li>
    </ul>
    <hr>
    <h5>Daftar Mata Kuliah {{ $mahasiswa->jurusan->nama }} yang diambil oleh Mahasiswa {{ $mahasiswa->nama }} :</h5>
    <form action="{{ route('proses-ambil-matakuliah', $mahasiswa->id) }}" method="post">
        @csrf
        <div class="row">
            @error('matakuliah.*')
                <div class="invalid-feedback my-3 block">
                    <strong>Error: Pilihan mata kuliah ada yang berulang / bukan dari jurusan
                        {{ $mahasiswa->jurusan->nama }}</strong>
                </div>
            @enderror
            <div class="col-md-12">
                @foreach ($matakuliahs as $matakuliah)
                    <div class="mb-2">
                        <input type="checkbox" class="form-check-input" id="matakuliah-{{ $matakuliah->id }}" name="matakuliah[]" value="{{ $matakuliah->id }}"
                            @if ( in_array($matakuliah->id, old('matakuliah') ?? ($matakuliahs_sudah_diambil ?? [] )) )
                                checked
                            @endif
                        >

                        <label class="form-check-label" for="matakuliah-{{ $matakuliah->id }}">{{ $matakuliah->nama }}
                            (<small>
                                <a href="{{ route('matakuliahs.show', ['matakuliah' => $matakuliah->id]) }}">{{ $matakuliah->kode }}</a>
                            </small>)
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
