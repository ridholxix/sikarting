@csrf

<div class="row mb-3">
    <label for="kode" class="col-form-label text-md-end col-md-3">Kode</label>
    <div class="col-md-4 align-self-center">
        <div class="user-select-none @error('kode') is-invalid @enderror">
            {{ $last_kode ?? $gejala->kode }}
        </div>
        <input type="hidden" name="kode" id="kode" value="{{ $last_kode ?? $gejala->kode }}">
        @error('kode')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nama" class="col-form-label text-md-end col-md-3">Nama</label>
    <div class="col-md-4">
        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Gejala" value="{{ @old('nama') ?? $gejala->nama ?? '' }}" autofocus>
        @error('nama')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>
