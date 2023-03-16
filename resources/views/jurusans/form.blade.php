@csrf
<div class="row mb-3">
    <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Jurusan</label>
    <div class="col-md-4">
        <input type="text" id="nama" class="form-control @error('nama')
            is-invalid
        @enderror" name="nama" value="{{ old('nama') ?? $jurusan->nama ?? '' }}">

        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Kepala Jurusan</label>
    <div class="col-md-4">
        <input type="text" id="kepala_jurusan" class="form-control @error('kepala_jurusan')
            is-invalid
        @enderror" name="kepala_jurusan" value="{{ old('kepala_jurusan') ?? $jurusan->kepala_jurusan ?? '' }}">

        @error('kepala_jurusan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nama" class="col-md-3 col-form-label text-md-end">Daya Tampung Jurusan</label>
    <div class="col-md-4">
        <input type="text" id="daya_tampung" class="form-control w-25 @error('daya_tampung')
            is-invalid
        @enderror" name="daya_tampung" value="{{ old('daya_tampung') ?? $jurusan->daya_tampung ?? '' }}">

        @error('daya_tampung')
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
