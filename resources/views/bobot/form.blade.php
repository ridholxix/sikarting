@csrf

<div class="row mb-1">
    <label for="kode" class="col-form-label text-md-end col-md-3">Kode</label>
    <div class="col-md-4 align-content-center">
        <div class="user-select-none @error('kode') is-invalid @enderror">
            {{ $last_kode ?? $bobot->kode }}
        </div>
        <input type="hidden" name="kode" id="kode" value="{{ $last_kode ?? $bobot->kode }}">
        @error('kode')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="kode_gejala" class="col-form-label text-md-end col-md-3">Kode Gejala</label>
    <div class="col-md-4">
        <select name="gejala_id" id="kode_gejala" class="form-select @error('gejala_id') is-invalid @enderror @error('stunting_id') is-invalid @enderror">
            @foreach ($gejalas as $gejala)
                @if ($gejala->id == (old('gejala_id') ?? $bobot->gejala_id ?? '') )
                    <option selected value="{{ $gejala->id }}">{{ $gejala->kode }}</option>    
                @else
                    <option value="{{ $gejala->id }}">{{ $gejala->kode }}</option>
                @endif
            @endforeach
        </select>
        @error('gejala_id')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="kode_stunting" class="col-form-label text-md-end col-md-3">Kode Stunting</label>
    <div class="col-md-4">
        <select name="stunting_id" id="kode_stunting" class="form-select @error('stunting_id') is-invalid @enderror">
            @foreach ($stuntings as $stunting)
            @if ($stunting->id == (old('stunting_id') ?? $bobot->stunting_id ?? '') )
                <option selected value="{{ $stunting->id }}">{{ $stunting->kode }}</option>    
            @else
                <option value="{{ $stunting->id }}">{{ $stunting->kode }}</option>
            @endif
            @endforeach
        </select>
        @error('stunting_id')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="probabilitas" class="col-form-label text-md-end col-md-3">Nilai probabilitas</label>
    <div class="col-md-4">
        <input type="number" step="0.1" name="probabilitas" id="probabilitas" class="form-control @error('probabilitas') is-invalid @enderror" placeholder="Nilai probabilitas" value="{{ @old('probabilitas') ?? $bobot->probabilitas ?? '' }}">
        @error('probabilitas')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">
        @if ($tombol == 'Edit')
            <input type="hidden" name="old_gejala_id" value="{{ $bobot->gejala_id }}">
            <input type="hidden" name="old_stunting_id" value="{{ $bobot->stunting_id }}">
        @endif
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>