@csrf
<div class="row mb-3">
    <label for="NIM" class="col-md-3 col-form-label text-md-end">NIM</label>
    <div class="col-md-4">
        <input type="text" id="NIM" class="form-control @error('NIM')
            is-invalid
        @enderror"
            name="NIM" value="{{ old('NIM') ?? ($mahasiswa->NIM ?? '') }}"
            placeholder="8 digit angka NIM, contoh: 17200475">

        @error('NIM')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Mahasiswa</label>
    <div class="col-md-4">
        <input type="text" id="nama"
            class="form-control @error('nama')
            is-invalid
        @enderror" name="nama"
            value="{{ old('nama') ?? ($mahasiswa->nama ?? '') }}">

        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="jurusan_id" class="col-md-3 col-form-label text-md-end">Pilih Jurusan</label>
    @if (($tombol == 'Ubah') AND ($mahasiswa->matakuliahs->count() > 0))
        <div class="col-md-9 d-flex align-items-center">
            <div>{{ $mahasiswa->jurusan->nama }} <small>(tidak bisa diubah karena sudah mengambil
                {{ $mahasiswa->matakuliahs->count() }} mata kuliah)</small>
            </div>
        </div>
        <input type="hidden" name="jurusan_id" id="jurusan_id" value="{{ $mahasiswa->jurusan_id }}">
    @else
        <div class="col-md-4">
            <select type="text" id="jurusan_id" class="form-select @error('jurusan_id') is-invalid @enderror"
                name="jurusan_id">
                @foreach ($jurusans as $jurusan)
                    @if ($jurusan->id == (old('jurusan_id') ?? ($mahasiswa->jurusan_id ?? '')))
                        <option value="{{ $jurusan->id }}" selected>
                            {{ $jurusan->nama }}
                        </option>
                    @else
                        <option value="{{ $jurusan->id }}">
                            {{ $jurusan->nama }}
                        </option>
                    @endif
                @endforeach
            </select>

            @error('jurusan_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif
</div>

{{-- Trik agar bisa kembali ke halaman yang klik --}}
@isset($mahasiswa) {{-- $mahasiswa berasal dari mahasiswaController --}}
<input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() . '#row-' . $mahasiswa->id }}">
@else
<input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() }}">
@endisset

<div class="row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>
