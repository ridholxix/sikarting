@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <div class="mb-4 text-center">
                <h2>Hasil Diagnosa</h2>
                <hr class="w-25 mx-auto">
            </div>

            <div>
{{--                @dd($resultNB, $resultDS)--}}
                <h5 class="fw-bold">Hasil Diagnosa: </h5>
                <p class="text-muted">Berikut adalah hasil diagnosa dengan menggunakan algoritma naive bayes dan dempster shafer, di sebelah kiri adalah hasil dengan algoritma Naive Bayes dengan hasil kesimpulan menunjukkan kemungkinan besar user mengalami <strong>{{ $stuntings->where('id', $resultNB->keys()->first())->first()->nama }}</strong> dengan nilai persentase kemungkinan sebesar <strong>{{ number_format($resultNB->first()['percent'], 2) }}%</strong>. Hasil di sebelah kanan adalah dengan menggunakan algoritma Dempster Shafer, dengan hasil kesimpulan <strong>{{ $resultDS->first()['nama'] ?? $resultDS->keys()->first() }}</strong> dengan nilai persentase kemungkinan sebesar <strong>{{ $resultDS->first()['percent'] }}%</strong>. Untuk melihat detail perhitungan bisa menuju link berikut: <button type="submit" class="d-inline text-decoration-underline fw-bold" form="stepForm"> Lihat Langkah Perhitungan </button>
                </p>
            </div>

            <form action="{{ route('diagnosa.step') }}" method="POST" id="stepForm">
                @csrf
                @foreach($gejala_ids as $g)
                    <input type="hidden" name="user_gejala[]" value="{{ $g }}" class="d-inline">
                @endforeach
            </form>

            {{-- <div class="alert alert-primary text-center"> --}}
            {{--     <strong>Kesimpulan:</strong><br> --}}
            {{--     Hasil diagnosa menunjukkan kemungkinan terbesar adalah --}}
            {{--     <strong>{{ $stuntings->where('id',$resultNB->keys()->first())->first()->nama }}</strong> --}}
            {{-- </div> --}}

            <div class="row">

                <div class="col-6">
                    <div class="card mb-3">

                        <div class="card-header text-center">
                            <h5 class="mb-0">Algoritma Naive Bayes</h5>
                        </div>

                        <div class="card-body">

                            <h6 class="fw-bold mb-3">
                                {{ $stuntings->where('id', $resultNB->keys()->first())->first()->nama }}
                            </h6>

                            <p class="text-muted mb-3">Hasil dalam persentase:</p>

                            @foreach ($resultNB as $key => $data)
                                @php
                                    $isTop = $loop->iteration == 1;
                                    $class = $isTop ? 'success' : 'secondary';
                                @endphp

                                <div class="mb-3">

                                    <div class="d-flex justify-content-between">
                                    <span class="{{ $isTop ? 'fw-bold' : '' }}">
                                        {{ $stuntings->where('id', $key)->first()->nama }}
                                    </span>
                                        <span class="badge bg-{{ $class }}">
                                        {{ round($data['percent'],2) }}%
                                    </span>
                                    </div>

                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-{{ $class }}"
                                             style="width: {{ $data['percent'] }}%">
                                        </div>
                                    </div>

                                    {{-- ✅ PENJELASAN --}}
                                    <small class="text-muted">
                                        @if($loop->iteration == 1)
                                            Kemungkinan tertinggi berdasarkan kombinasi gejala yang dipilih.
                                        @elseif($loop->iteration == 2)
                                            Kemungkinan sedang terhadap kondisi stunting.
                                        @else
                                            Kemungkinan rendah terhadap kondisi ini.
                                        @endif
                                    </small>

                                </div>
                            @endforeach

                            {{-- ✅ INTERPRETASI --}}
                            <div class="mt-3">
                                <small class="text-muted">
                                    Metode Naïve Bayes memberikan hasil klasifikasi tegas berdasarkan probabilitas tertinggi dari data gejala.
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ✅ DEMPSTER SHAFER --}}
                <div class="col-6">
                    <div class="card mb-3">

                        <div class="card-header text-center">
                            <h5 class="mb-0">Algoritma Dempster Shafer</h5>
                        </div>

                        <div class="card-body">

                            <h6 class="fw-bold mb-3">
                                {{ count(explode('#', $resultDS->keys()->first())) > 1
                                    ? $resultDS->first()['nama']
                                    : ($stuntings->where('kode', $resultDS->keys()->first())->first()->nama
                                        ?? ($resultDS->keys()->first() == 'theta' ? 'θ (theta)' : 'Tidak diketahui')) }}
                            </h6>

                            <p class="text-muted mb-3">Hasil dalam persentase:</p>

                            @foreach ($resultDS as $key => $data)
                                @php
                                    $isTop = $loop->iteration == 1;
                                    $class = $isTop ? 'success' : 'secondary';
                                @endphp

                                <div class="mb-3">

                                    <div class="d-flex justify-content-between">
                                    <span class="{{ $isTop ? 'fw-bold' : '' }}">
                                        {{ debug($resultDS) }}
                                        {{ count(explode('#', $key)) > 1 ? $data['nama'] . " (" . $data['kode'] . ")" : ($stuntings->where('kode', $key)->first()->nama ?? ($key == 'theta' ? 'θ (theta)' : $stuntings->find($key)->nama)) }}
                                    </span>

                                        <span class="badge bg-{{ $class }}">
                                        {{ round($data['percent'],2) }}%
                                    </span>
                                    </div>

                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-{{ $class }}"
                                             style="width: {{ $data['percent'] }}%">
                                        </div>
                                    </div>

                                    <small class="text-muted">
                                        @if($key == 'theta')
                                            Menunjukkan ketidakpastian karena informasi gejala belum cukup kuat.
                                        @elseif($loop->iteration == 1)
                                            Nilai keyakinan tertinggi terhadap kemungkinan kondisi ini.
                                        @else
                                            Kemungkinan tambahan berdasarkan kombinasi evidence.
                                        @endif
                                    </small>

                                </div>
                            @endforeach

                        </div>

                        {{-- ✅ FOOTER INTERPRETASI --}}
                        <div class="card-footer">
                            <small class="text-muted">
                                Metode Dempster-Shafer mampu menangani ketidakpastian. Nilai θ menunjukkan bahwa sistem belum cukup yakin untuk menentukan hasil secara pasti.
                            </small>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
