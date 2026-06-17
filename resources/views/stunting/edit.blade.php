@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-3">
            <div class="d-flex flex-row align-items-center">
                <a href="{{ session()->previousUrl() }}"><i class="bi bi-backspace-fill fs-1"></i></a>
                <h1 class="h2 ms-3">Edit Stunting</h1>
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <form action="{{ route('stuntings.update', ['stunting' => $stunting->kode]) }}" method="post">
                @method('PATCH')
                @include('stunting.form', ['tombol' => 'Edit'])
            </form>
        </div>
    </div>
@endsection