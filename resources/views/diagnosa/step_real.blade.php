@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="text-center mb-4">
            <h3>Langkah Perhitungan Diagnosa</h3>
            <hr class="w-25 mx-auto">
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <strong>Gejala yang Dipilih</strong>
            </div>
            <div class="card-body">
                @foreach($gejalas as $g)
                    <span class="badge bg-primary me-1" data-bs-toggle="tooltip" data-bs-title="{{ $g->nama }}">{{ $g->kode }}</span>
                @endforeach
            </div>
        </div>

        <div class="d-flex g-0 gap-4">
            <div class="card mb-4 w-50">
                <div class="card-header">
                    <strong>Langkah Naïve Bayes</strong>
                </div>

                <div class="card-body">

                    <div class="mb-4">
                        <strong>1. Menentukan Probabilitas Awal (Prior)</strong>

                        @foreach($resultNB as $k => $v)
                            <div>Kelas (K{{ $k }}) {{ $stuntings->find($k)->nama }} = {{ $stuntings->find($k)->prior }}</div>
                        @endforeach
                    </div>

                    {{-- STEP 2 --}}
                    <div class="mb-4">
                        <strong>2. Mengambil Likelihood dari Setiap Gejala</strong>

                        @foreach($resultNB as $k => $d)
                            <div class="mb-2">
                                <strong>{{ $stuntings->find($k)->nama ?? $k }}:</strong>
                                <br>

                                @foreach($gejalas as $idx => $g)
                                    @if(!$g->stuntings->find($k))
                                        @continue
                                    @endif
                                    P({{ $g->kode }} | K{{ $k }}) = {{ $g->stuntings->find($k)->bobot->probabilitas ?? '' }} <br>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    {{-- STEP 3 --}}
                    <div class="mb-4">
                        <strong>3. Perhitungan Probabilitas</strong>
                        @php
                            $total = 0;
                        @endphp

                        @foreach($resultNB as $k => $d)
                            @php
                                $total += $d['prob_val']
                            @endphp
                            <div class="mb-2">
                                <strong>Kelas {{ $k }}</strong><br>

                                {{ $stuntings->find($k)->prior }}
                                @foreach($gejalas as $gejala)
                                    @if(!$gejala->stuntings->find($k))
                                        @continue
                                    @endif
                                    × {{ $gejala->stuntings()->find($k)->bobot->probabilitas ?? '' }}
                                @endforeach
                                <br>
                                    = {{ number_format($d['prob_val'], 6) }}
                            </div>
                        @endforeach
                    </div>

                    {{-- STEP 4 --}}
                    <div class="mb-3">
                        <strong>4. Normalisasi</strong>

                        @foreach($resultNB as $k => $v)
                            <div>
                                Kelas {{ $k }} = {{ $v['prob_val'] }} / {{ $total }} = {{ number_format($v['percent'], 2) }}%
                            </div>
                        @endforeach
                    </div>

                    {{-- STEP 5 --}}
                    <div>
                        <strong>5. Keputusan</strong>
                        <div class="text-success">
                            <div>
                                <span class="fw-bold">{{ $stuntings->find($resultNB->keys()->first())->nama }}
                                (K{{ $resultNB->keys()->first() }})</span>
                                = {{ $resultNB->first()['percent'] }}%
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mb-4 w-50">
                <div class="card-header">
                    <strong>Langkah Dempster Shafer</strong>
                </div>

                <div class="card-body">

                <div class="mb-4">
                    <strong>1. Menentukan Mass Function</strong>

                    @foreach($allMassF->where('gejala_id','!=', 'gejala_id') as $massF)
                        <div class="mb-2">
                            {{-- <strong>Gejala {{ $massF['gejala_id'] }}</strong><br> --}}

                            @for($i = 1; $i < count($massF) - 1; $i++)
                                m<sub>G{{ $massF['gejala_id'] }}</sub>({{ implode(',', $massF[$i]['frame_of_discerment']) }}) = {{ $massF[$i]['mass_belief'] }} <br>
                            @endfor
                            m<sub>G{{ $massF['gejala_id'] }}</sub>(θ) = {{ $massF[count($massF)-1]['mass_belief'] }}
                        </div>
                    @endforeach
                </div>

                         {{-- <img src="{{ asset('ds.png') }}" alt=""> --}}

                <div class="mb-4">
                    <strong>2. Kombinasi Evidence (m<sub>x</sub> ⊕ m<sub>y</sub>)</strong>
                    <br>

                    @while($allMassF->count() > 1)
                        @php
                            // if(count($allMassF[0]) < 3){
                            //     dd($massX, $massY, $allMassF[0]);
                            // }

                            $massX = $allMassF->shift();
                            $massY = $allMassF->shift();

                            $massZ = collect($allPossibleMassF->shift());
                            $massYZ = $allMassF[0];
                            $massZ_ganjil = [];
                            $massZ_genap = [];
                        @endphp

                        @for($i = 1; $i < count($massX); $i++)
                            m<sub>x</sub>({{ implode(',',$massX[$i]['frame_of_discerment']) }}) = {{ $massX[$i]['mass_belief'] }} <br>
                        @endfor
                        @for($i = 1; $i < count($massY); $i++)
                            m<sub>y</sub>({{ implode(',',$massY[$i]['frame_of_discerment']) }}) = {{ $massY[$i]['mass_belief'] }} <br>
                        @endfor

                        @php
                            for($i = 0; $i < count($massZ); $i++){
                                if($i % 2 == 0){
                                    $massZ_genap[] = $massZ[$i];
                                } else {
                                    $massZ_ganjil[] = $massZ[$i];
                                }
                            }
                        @endphp

                        {{-- @dump($massYZ)--}}

                        <table class="table text-center">
                            @for($i = 1; $i < count($massY)+1; $i++)
                                <tr>
                                    @if($i > 1)
                                        <td class="border bg-warning-subtle"><strong>{ {{ implode(',',$massY[$i-1]['frame_of_discerment']) }} }</strong></td>
                                        <td class="border bg-body-secondary">{{ $massY[$i-1]['mass_belief'] }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif
                                @for($j = 1; $j < count($massX); $j++)
                                    @if($i >= 2 )
                                        <td class="border">
                                            @if($i % 2 != 0)
                                                @php
                                                    $arr = array_shift($massZ_ganjil);
                                                @endphp
                                                <strong>{ {{ implode(',',$arr['frame_of_discerment']) }} }</strong>
                                            @else
                                                @php
                                                    $arr = array_shift($massZ_genap);
                                                @endphp
                                                <strong>{
                                                    @if(isset($arr['frame_of_discerment']))
                                                        {{ implode(',',$arr['frame_of_discerment']) }}
                                                    @else
                                                        empty
                                                    @endif
                                                        }</strong>
                                            @endif
                                        </td>
                                        <td class="border">
                                            @if($i % 2 != 0)
                                                {{ $arr['mass_belief'] }}
                                            @else
                                                @if(isset($arr['mass_belief']))
                                                    {{ $arr['mass_belief'] }}
                                                @else

                                                @endif
                                            @endif
                                        </td>
                                    @else
                                        <td class="border bg-warning-subtle"><strong>{
                                                @if(isset($massX[$j]))
                                                    {{ implode(',',$massX[$j]['frame_of_discerment']) }}
                                                @else
                                                    empty
                                                @endif
                                                    }</strong></td>
                                        <td class="border bg-body-secondary">
                                            @if(isset($massX[$j]))
                                                {{ $massX[$j]['mass_belief'] }}
                                            @else
                                                {{ debug($massX) }}
                                            @endif
                                        </td>
                                    @endif
                                @endfor
                                </tr>
                            @endfor
                        </table>

                        @php $empty = 0; @endphp

                        @foreach($massZ as $massF)
                            @if(empty($massF['frame_of_discerment']))
                                <span class="text-danger">m<sub>z</sub>({{ implode(',',$massF['frame_of_discerment']) }}) = {{ $massF['mass_belief'] }} <br></span>
                                @php $empty += $massF['mass_belief'] @endphp
                            @else
                                m<sub>z</sub>({{ implode(',',$massF['frame_of_discerment']) }}) = {{ $massF['mass_belief'] }} / (1 - {{ $empty }}) = {{ $massF['mass_belief'] / (1 -  $empty) }}<br>
                            @endif
                        @endforeach
                        <br>
                        @for($i = 1; $i < count($massYZ); $i++)
                            m<sub>z</sub>({{ implode(',',$massYZ[$i]['frame_of_discerment']) }}) = {{ $massYZ[$i]['mass_belief'] }} <br>
                        @endfor

                        <hr>

                    @endwhile

                </div>

                <div class="mb-4">
                    <strong>3. Kesimpulan</strong>
                    <br>

                    <span class="text-success">
                        <strong>[ {{ implode(',',explode('#',$resultDS->keys()->first())) }} ]</strong> = {{ $resultDS->first()['percent'] }}%
                    </span>

                </div>
            </div>
        </div>


@endsection
