@csrf
<div class="row mb-3">
    <label for="NID" class="col-md-3 col-form-label text-md-end">NID</label>
    <div class="col-md-4">
        <input type="text" id="NID" class="form-control @error('NID')
            is-invalid
        @enderror"
            name="NID" value="{{ old('NID') ?? ($dosen->NID ?? '') }}">

        @error('NID')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Dosen</label>
    <div class="col-md-4">
        <input type="text" id="nama"
            class="form-control @error('nama')
            is-invalid
        @enderror" name="nama"
            value="{{ old('nama') ?? ($dosen->nama ?? '') }}">

        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="jurusan_id" class="col-md-3 col-form-label text-md-end">Pilih Jurusan</label>
    <div class="col-md-4">
        <select type="text" id="jurusan_id" class="form-select @error('jurusan_id') is-invalid @enderror"
            name="jurusan_id">
            @foreach ($jurusans as $jurusan)
                @if ($jurusan->id == (old('jurusan_id') ?? $dosen->jurusan_id ?? ""))
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
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>
