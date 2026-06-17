@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8 text-center">

                <div class="mb-4">
                    <h2>Diagnosa Dini Stunting</h2>
                    <hr class="w-25 mx-auto">
                </div>

                <div class="mb-4">
                    <p class="text-muted"> Sistem ini membantu mendeteksi kemungkinan stunting pada anak berdasarkan gejala yang dipilih dengan menggunakan metode <strong>Naïve Bayes</strong> dan <strong>Dempster-Shafer</strong>.</p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('diagnosa.create') }}" class="btn btn-primary btn-lg px-4 py-2">Diagnosa Sekarang</a>
                </div>
            </div>
    </div>
</div>

@endsection
