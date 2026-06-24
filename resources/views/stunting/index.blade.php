@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="mb-1">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h1>Daftar Stunting</h1>
                    @auth
                        <a class="btn btn-primary" href="{{ route('stuntings.create') }}">Tambah Stunting</a>
                    @endauth
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
                <form action="{{ route('stuntings.index') }}" method="get" class="d-flex gap-2 ms-auto col-4">
                    <input type="search" name="search" id="search" class="form-control" value="{{ request()->query->get('search') ?? '' }}">
                    <button type="submit" class="btn btn-primary col-auto">Cari Stunting</button>
                </form>
            </div>

            <div class="mb-3">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Stunting</th>
                            <th>Nama Stunting</th>
                            <th>Prior Stunting</th>
                            @auth
                                <th class="text-center">Operasi</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stuntings as $stunting)
                            <tr>
                                <td>{{ $stuntings->firstItem() + $loop->iteration - 1 }}</td>
                                <td>
                                    <a href="{{ route('stuntings.show', ['stunting' => $stunting->kode]) }}">{{ $stunting->kode }}</a>
                                </td>
                                <td class="data_nama">{{ $stunting->nama }}</td>
                                <td>{{ $stunting->prior }}</td>
                                @auth
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a class="btn btn-warning btn-sm" href="{{ route('stuntings.edit', ['stunting' => $stunting->kode]) }}">Edit</a>
                                            <button class="btn btn-danger btn-sm btn-hapus" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-kode="{{ $stunting->kode }}">Hapus</button>
                                        </div>
                                    </td>
                                @endauth
                            </tr>
                        @empty
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $stuntings->links() }}
            <form action="{{ route('stuntings.destroy', ['stunting' => 'S###']) }}" method="post" id="formDelete">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-4">Hapus Stunting <strong class="form_data_nama"></strong> ?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Data stunting <strong><span class="form_data_nama"></span> (<span class="form_data_kode"></span>)</strong> beserta data pada tabel probabilitas yang terkait dengan kode stunting ini akan di hapus.
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
    </div>
@endsection
