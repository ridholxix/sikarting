@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-3">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h1>Daftar Probabilitas</h1>
                    <a class="btn btn-primary" href="{{ route('bobots.create') }}">Tambah Probabilitas</a>
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
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Kode Gejala</th>
                            <th>Kode Stunting</th>
                            <th>Nilai Probabilitas</th>
                            <th class="text-center">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bobots as $bobot)
                        <tr>
                            <td>{{ $loop->iteration + $bobots->firstItem() - 1 }}</td>
                            <td>
                                <a href="{{ route('bobots.show', $bobot->kode) }}">{{ $bobot->kode }}</a>
                            </td>
                            <td>
                                <a href="{{ route('gejalas.show', ['gejala' => $bobot->gejala->kode]) }}" data-bs-toggle="tooltip" data-bs-title="{{ $bobot->gejala->nama }}">{{ $bobot->gejala->kode }}</a>
                            </td>
                            <td>
                                <a href="{{ route('stuntings.show', ['stunting' => $bobot->stunting->kode]) }}" data-bs-toggle="tooltip" data-bs-title="{{ $bobot->stunting->nama }}">{{ $bobot->stunting->kode }}</a>
                            </td>
                            <td>{{ $bobot->probabilitas }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-warning btn-sm" href="{{ route('bobots.edit', ['bobot' => $bobot->kode]) }}">Edit</a>
                                    <button class="btn btn-danger btn-sm btn-hapus" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-kode="{{ $bobot->kode }}">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $bobots->links() }}
            <form action="{{ route('bobots.destroy', ['bobot' => 'GS###']) }}" method="post" id="formDelete">
                <input type="hidden" name="gejala_id" value="{{ $bobot->gejala_id ?? ''}}">
                <input type="hidden" name="stunting_id" value="{{ $bobot->stunting_id ?? ''}}">
                <input type="hidden" name="gejala_stunting_kode" value="{{ $bobot->kode ?? ''}}">
                <input type="hidden" name="gejala_stunting_id" value="{{ $bobot->id ?? ''}}">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-4">Hapus Stunting <strong>{{ $bobot->kode ?? '' }}</strong> ?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Data probabilitas <strong>{{ $bobot->kode ?? ''}}</strong> dengan Gejala <strong>{{ $bobot->kode_gejala ?? '' }}</strong> dan Stunting <strong>{{ $bobot->kode_stunting ?? ''}}</strong> akan di hapus.
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
