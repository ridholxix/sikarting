@extends('layouts.app')
@section('content')
    {{ debug($bobot) }}
    <div class="container">
        <div class="mb-3">
            <div class="d-flex flex-row align-items-center">
                <a href="{{ session()->previousUrl() }}"><i class="bi bi-backspace-fill fs-1"></i></a>
                <h1 class="h2 ms-3">Data Probabilitas</h1>
                <div class="ms-auto d-flex gap-2">
                    <a href="{{ route('bobots.edit', ['bobot' => $bobot->kode]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <ul>
                <li>Kode:
                    <strong>{{ $bobot->kode }}</strong>
                </li>
                <li>Gejala :
                    {{ $bobot->gejala->nama }}<strong> ( <a href="{{ route('gejalas.show', ['gejala' => $bobot->gejala->kode]) }}">{{ $bobot->gejala->kode }}</a> )</strong>
                </li>
                <li>Stunting :
                    {{ $bobot->stunting->nama }} <strong>( <a href="{{ route('stuntings.show', ['stunting' => $bobot->stunting->kode]) }}">{{ $bobot->stunting->kode }}</a> )</strong>
                </li>
                <li>Nilai Probabilitas:
                    <strong>{{ $bobot->probabilitas }}</strong>
                </li>
            </ul>
        </div>
        <form action="{{ route('bobots.destroy', compact('bobot')) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="gejala_id" value="{{ $bobot->gejala_id }}">
            <input type="hidden" name="stunting_id" value="{{ $bobot->stunting_id }}">
            <input type="hidden" name="bobot_kode" value="{{ $bobot->kode }}">
            <div class="modal fade" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-4">Hapus Probabilitas <strong>{{ $bobot->kode }}</strong> ?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Data probabilitas <strong>{{ $bobot->kode }}</strong> dengan Gejala <strong>{{ $bobot->kode_gejala }}</strong> dan Stunting <strong>{{ $bobot->kode_stunting }}</strong> akan di hapus.
                            </p>
                            <p>Apakah Anda yakin ingin melanjutkan penghapusan?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
