@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-3">
            <div class="d-flex flex-row align-items-center">
                <a href="{{ session()->previousUrl() }}" class="bi bi-backspace-fill fs-1"></a>
                <h1 class="ms-3">Data Gejala</h1>
                @auth
                    <div class="ms-auto d-flex gap-2">
                        <a href="{{ route('gejalas.edit', ['gejala' => $gejala->kode]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                    </div>
                @endauth
            </div>
            <hr>
        </div>

        <div class="mb-3">
            <ul>
                <li>Kode:
                    <strong>{{ $gejala->kode }}</strong>
                </li>
                <li>Nama:
                    <strong>{{ $gejala->nama }}</strong>
                </li>
            </ul>
        </div>

        <div class="mb-3">
            <h4>Daftar Stunting: </h4>
            <ul class="list-group list-group-flush list-group-numbered">
                @forelse ($gejala->stuntings as $stunting)
                    <li class="list-group-item">{{ $stunting->nama }}
                        <strong>(<a href="{{ route('stuntings.show', ['stunting' => $stunting->kode]) }}">{{ $stunting->kode }}</a>)</strong>
                        -- <span class="font-monospace">{ {{ $stunting->bobot->probabilitas }} }</span>
                    </li>
                @empty
                    <li class="text-muted">Belum ada data..</li>
                @endforelse
            </ul>
        </div>

        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4">Hapus Gejala <strong>{{ $gejala->nama }}</strong> ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Data gejala <strong>{{ $gejala->nama }} ({{ $gejala->kode }})</strong> beserta data pada tabel probabilitas yang terkait dengan kode gejala ini akan di hapus.
                        </p>
                        <p>Apakah Anda yakin ingin melanjutkan penghapusan?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('gejalas.destroy', ['gejala' => $gejala->kode]) }}" method="post">
                            @csrf
                            @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
