@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-3">
            <div class="d-flex flex-row align-items-center">
                <a href="{{ route('gejalas.index') }}"><i class="bi bi-backspace-fill fs-1"></i></a>
                <h1 class="h2 ms-3">Tambah Gejala</h1>
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <form action="{{ route('gejalas.store') }}" method="post">
                @include('gejala.form', ['tombol' => 'Tambah'])
            </form>
        </div>
    </div>
@endsection