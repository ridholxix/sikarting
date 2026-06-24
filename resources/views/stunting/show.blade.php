@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-3">
            <div class="d-flex flex-row align-items-center">
                <a href="{{ session()->previousUrl() }}"><i class="bi bi-backspace-fill fs-1"></i></a>
                <h1 class="h2 ms-3">Data Stunting</h1>
                @auth
                    <div class="ms-auto d-flex gap-2">
                        <a href="{{ route('stuntings.edit', ['stunting' => $stunting->kode]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                    </div>
                @endauth
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <ul>
                <li>Kode:
                    <strong>{{ $stunting->kode }}</strong>
                </li>
                <li>Nama:
                    <strong>{{ $stunting->nama }}</strong>
                </li>
                <li>Prior:
                    <strong>{{ $stunting->prior }}</strong>
                </li>
            </ul>
        </div>
        <div class="mb-3">
            <h4>Daftar Gejala: </h4>
            <ol class="list-group list-group-flush">
                @forelse ($gejalas as $gejala)
                <div class="d-flex align-items-center">
                    <span>{{ $loop->iteration + $gejalas->firstItem() - 1 }}. </span>
                    <li class="list-group-item border-0 py-1">{{ $gejala->nama }}
                        <strong>(
                            <a href="{{ route('gejalas.show', ['gejala' => $gejala->kode]) }}">{{ $gejala->kode }}</a>
                        )</strong> --
                        <span class="font-monospace">
                            { {{ $gejala->bobot->probabilitas }} }
                        </span>
                    </li>
                </div>
                @empty
                    <li class="text-muted">Belum ada data..</li>
                @endforelse
                <div class="mt-3">
                    {{ $gejalas->links() }}
                </div>
            </ol>
        </div>
        <form action="{{ route('stuntings.destroy', ['stunting' => $stunting->kode]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-4">Hapus tunting <strong>{{ $stunting->nama }}</strong> ?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Data stunting <strong>{{ $stunting->nama }} ({{ $stunting->kode }})</strong> beserta data pada tabel probabilitas yang terkait dengan kode stunting ini akan di hapus.
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
