@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="mb-3 text-center">
            <h1>Create Diagnosa</h1>
            <hr class="w-25 mx-auto">
        </div>
        <div class="mb-3">
            <form action="{{ route('diagnosa.proses') }}" method="post">
                @include('diagnosa.form')
            </form>
        </div>
    </div>
</div>

@endsection
