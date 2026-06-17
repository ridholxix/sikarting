@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-1">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h1>Daftar Gejala</h1>
                    <a class="btn btn-primary" href="{{ route('gejalas.create') }}">Tambah Gejala</a>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span>{!! session()->get('success') !!}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                <hr>
            </div>
            <div class="mb-3">
                <form action="{{ route('gejalas.index') }}" method="get" class="d-flex gap-2 ms-auto col-4">
                    <input type="search" name="search" id="search" class="form-control" value="{{ request()->query->get('search') ?? '' }}">
                    <button type="submit" class="btn btn-primary col-auto">Cari Gejala</button>
                </form>

            </div>
            <div class="mb-3">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th class="text-center">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($gejalas as $gejala)
                            <tr>
                                <td>{{ $gejalas->firstItem() + $loop->iteration - 1 }}</td>
                                <td>
                                    <a href="{{ route('gejalas.show', ['gejala' => $gejala->kode]) }}">{{ $gejala->kode }}</a>
                                </td>
                                <td class="data_nama">{{ $gejala->nama }}</td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('gejalas.edit', ['gejala' => $gejala->kode]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm btn-hapus" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-kode="{{ $gejala->kode }}">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $gejalas->links() }}
        </div>
        <form action="{{ route('gejalas.destroy', ['gejala' => 'G###']) }}" method="post" id="formDelete">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-4">Hapus Gejala <strong class="form_data_nama"></strong> ?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Data gejala <strong><span class="form_data_nama"></span> (<span class="form_data_kode"></span>)</strong> beserta data pada tabel probabilitas yang terkait dengan kode gejala ini akan di hapus.
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
