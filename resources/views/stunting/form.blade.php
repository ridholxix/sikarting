@csrf

<div class="row mb-3">
    <label for="kode" class="col-form-label text-md-end col-md-3">Kode</label>
    <div class="col-md-4 align-content-center">
        <div class="user-select-none @error('kode') is-invalid @enderror">
            {{ $last_kode ?? $stunting->kode }}
        </div>
        <input type="hidden" name="kode" id="kode" class="@error('kode') is-invalid @enderror" placeholder="Kode Stunting" value="{{ $last_kode ?? $stunting->kode }}">
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
        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Stunting" value="{{ @old('nama') ?? $stunting->nama ?? '' }}">
        @error('nama')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="prior" class="col-form-label text-md-end col-md-3">prior</label>
    <div class="col-md-4">
        <input type="text" name="prior" id="prior" class="form-control @error('prior') is-invalid @enderror" placeholder="Prior Stunting" value="{{ @old('prior') ?? $stunting->prior ?? '' }}">
        @error('prior')
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