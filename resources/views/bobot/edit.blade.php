@extends('layouts.app')
@section('content')

<div class="container">
        <div class="mb-3">
            <div class="d-flex flex-row align-items-center">
                <a href="{{ session()->previousUrl() }}"><i class="bi bi-backspace-fill fs-1"></i></a>
                <h1 class="h2 ms-3">Edit Probabilitas</h1>
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <form action="{{ route('bobots.update', ['bobot' => $bobot->kode]) }}" method="post">
                @method('PUT')
                @include('bobot.form', ['tombol' => 'Edit'])
            </form>
        </div>
    </div>

@endsection
