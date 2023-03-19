@csrf
<div class="row mb-3">
    <label for="kode" class="col-md-3 col-form-label text-md-end">Kode Mata Kuliah</label>
    <div class="col-md-4">
        <input type="text" id="kode" class="form-control @error('kode') is-invalid @enderror" name="kode"
            value="{{ old('kode') ?? ($matakuliah->kode ?? '') }}" placeholder="5 kode mata kuliah, contoh: TI123">

        @error('kode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nama" class="col-md-3 col-form-label text-md-end">Nama Mata Kuliah</label>
    <div class="col-md-4">
        <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
            value="{{ old('nama') ?? ($matakuliah->nama ?? '') }}">
        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="jurusan_id" class="col-md-3 col-form-label text-md-end">Pilih Jurusan</label>
    @if (isset($dosen_id))
    <div class="col-md-4 flex align-items-center">
        @foreach ($jurusans as $jurusan)
        {{ $jurusan->nama }}
        @endforeach
    </div>
    <input type="hidden" name="jurusan_id" id="jurusan_id" value="{{ $jurusan->id }}">
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

<div class="row mb-3">
    <label for="dosen_id" class="col-md-3 col-form-label text-md-end">Pilih Dosen Pengajar</label>
    @if (isset($dosen_id))
    <div class="col-md-4 flex align-items-center">
        {{ $dosen_id->nama }}
    </div>
    <input type="hidden" name="dosen_id" id="dosen_id" value="{{ $dosen_id->id }}">
    @else
    <div class="col-md-4">
        <select name="dosen_id" id="dosen_id"
            class="form-select @error('dosen_id')
            is-invalid
        @enderror">
            @foreach ($dosens as $dosen)
                @if ($dosen->id == (old('dosen_id') ?? ($matakuliah->dosen->id ?? '')))
                    <option value="{{ $dosen->id }}" selected>{{ $dosen->nama }}</option>
                @else
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                @endif
            @endforeach
        </select>

        @error('dosen_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @endif
</div>

<div class="row mb-3">
    <label for="jumlah_sks" class="col-md-3 col-form-label text-md-end">
        Jumlah SKS
    </label>
    <div class="col-md-4">
        <select name="jumlah_sks" id="jumlah_sks" name="jumlah_sks"
            class="form-select @error('jumlah_sks')
            is-invalid
        @enderror">
            @for ($i = 1; $i <= 6; $i++)
                @if ($i == (old('jumlah_sks') ?? ($matakuliah->jumlah_sks ?? '')))
                    <option value="{{ $i }}" selected>{{ $i }}</option>
                @else
                    <option value="{{ $i }}">{{ $i }}</option>
                @endif
            @endfor
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>
