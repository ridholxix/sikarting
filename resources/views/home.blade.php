@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="mb-4 text-center">
            <img src="{{ asset('sikarting.ico') }}" alt="Sikarting Icon" class="mx-auto mt-5">
            <h1>Sikarting</h1>
            <p class="lead">Aplikasi Sistem Pakar diagnosa dini stunting</p>
            <hr class="w-25 mx-auto">
        </div>

        <div class="text-start">
            <h4>Basis Pengetahuan Sikarting</h4>
        </div>

        <div class="rounded d-flex gap-3">

            <div class="data-row d-flex align-items-start px-3 py-3 border" data-link="{{ route('gejalas.index') }}">
                <div style="width: 60px;" class="text-center me-3">
                    <i class="bi bi-exclamation-circle" style="font-size: 1.8rem"></i>
                </div>

                <div class="flex-grow-1">
                    <div class="fw-bold">Data Gejala</div>
                    <small class="text-muted">
                        Jumlah: {{ $gejala_count }}
                    </small>
                    <div>
                        <small class="text-muted">
                            Digunakan sebagai input dalam proses diagnosis stunting berdasarkan gejala yang dipilih pengguna.
                        </small>
                    </div>
                </div>
            </div>

            <div class="data-row d-flex align-items-start px-3 py-3 border" data-link="{{ route('stuntings.index') }}">
                <div style="width: 60px;" class="text-center me-3">
                    <i class="bi bi-virus" style="font-size: 1.8rem"></i>
                </div>

                <div class="flex-grow-1">
                    <div class="fw-bold">Data Stunting</div>
                    <small class="text-muted">
                        Jumlah: {{ $stunting_count }}
                    </small>
                    <div>
                        <small class="text-muted">
                            Berisi kategori hasil diagnosis seperti tidak stunting, stunting, dan stunting berat.
                        </small>
                    </div>
                </div>
            </div>

            <div class="data-row d-flex align-items-start px-3 py-3  border" data-link="{{ route('bobots.index') }}">

                <div style="width: 60px;" class="text-center me-3">
                    <i class="bi bi-percent" style="font-size: 1.8rem"></i>
                </div>

                <div class="flex-grow-1">
                    <div class="fw-bold">Data Probabilitas</div>
                    <small class="text-muted">
                        Jumlah: {{ $bobot_count }}
                    </small>
                    <div>
                        <small class="text-muted">
                            Digunakan dalam perhitungan metode Naïve Bayes dan Dempster-Shafer.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll(".data-row").forEach(row => {
            row.addEventListener("click", function () {
                const link = this.getAttribute("data-link");
                if (link) {
                    window.location.href = link;
                }
            });
        });
    </script>
@endsection
