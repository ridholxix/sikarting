<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProsesDiagnosaRequest;
use App\Models\Gejala;
use App\Models\Stunting;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        return view('diagnosa.index');
    }

    public function create()
    {
        return view('diagnosa.create', [
            'gejalas' => Gejala::has('stuntings')->get(),
        ]);
    }

    public function getEvidences($gejalas)
    {
        $evidences = [];
        foreach($gejalas as $gejala){
            foreach($gejala->stuntings as $stunting){
                $stunt_id = $stunting->bobot->stunting_id;
                $prob_val = $stunting->bobot->probabilitas;
                $evidences[$stunt_id][] = floatval($prob_val);
            }
        }
        return $evidences;
    }

    public function getMassFunction($gejalas){
        $massF = [];

        foreach($gejalas as $key_1 => $gejala){
            $massF[$key_1]['gejala_id'] = $gejala->id;
            $massF[$key_1][1] = ['mass_belief' => null];
            foreach($gejala->stuntings as $key_2 => $stunting){
                if($massF[$key_1][1]['mass_belief'] == null || $massF[$key_1][1]['mass_belief'] < $stunting->bobot->probabilitas){
                    $massF[$key_1][1] = ['mass_belief' => $stunting->bobot->probabilitas];
                    $massF[$key_1][2] = ['mass_belief' => 1 - $stunting->bobot->probabilitas];
                }
            }
            $massF[$key_1][1]['frame_of_discerment'] = $gejala->stuntings->pluck('id')->toArray();
            $massF[$key_1][2]['frame_of_discerment'] = ['theta'];
        }

        return $massF;
    }

    // public function getMassFunction($gejalas){
    //     $massF = [];
    //
    //     foreach($gejalas as $key_1 => $gejala){
    //         $massF[$key_1][0] = $gejala->id;
    //         $massF[$key_1][1][0] = [];
    //         foreach($gejala->stuntings as $key_2 => $stunting){
    //             if($massF[$key_1][1][0] == null || $massF[$key_1][1][0] < $stunting->bobot->probabilitas){
    //                 $massF[$key_1][1][0] = $stunting->bobot->probabilitas;
    //                 $massF[$key_1][2][0] = 1 - $stunting->bobot->probabilitas;
    //             }
    //         }
    //         $massF[$key_1][1][1] = $gejala->stuntings->pluck('id')->toArray();
    //         $massF[$key_1][2][1] = ['theta'];
    //     }
    //
    //     return $massF;
    // }

    public function proses(ProsesDiagnosaRequest $request)
    {
        $gejalas = Gejala::whereIn('id', $request['user_gejala'])->get();
        $evidences = $this->getEvidences($gejalas);
        $massF = $this->getMassFunction($gejalas);

        $resultNB = collect(NaiveBayesController::create($evidences))->sortBy('percent', SORT_NATURAL, true);
        $resultDS = collect(DempsterShaferController::create($massF))->sortBy('percent', SORT_NATURAL, true);

        $all_massF = DempsterShaferController::getAllMassF();

        return view('diagnosa.show', [
            'resultNB' => $resultNB,
            'resultDS' => $resultDS,
            'stuntings' => Stunting::get(),
            'gejala_ids' => $request['user_gejala'],
        ]);
    }

    public function step()
    {
        $gejalas = Gejala::whereIn('id', request()->input('user_gejala'))->get();
        $evidences = $this->getEvidences($gejalas);
        $massF = $this->getMassFunction($gejalas);

        $resultNB = collect(NaiveBayesController::create($evidences))->sortBy('percent', SORT_NATURAL, true);
        $resultDS = collect(DempsterShaferController::create($massF))->sortBy('percent', SORT_NATURAL, true);

        $all_massF = collect(DempsterShaferController::getAllMassF());
        $all_possible_massF = collect(DempsterShaferController::getAllPossibleMassF());

        $stuntings = Stunting::get();

        // dd($all_possible_massF);

        return view('diagnosa.step_real', [
            'gejalas' => $gejalas,
            'stuntings' => $stuntings,
            'resultNB' => $resultNB,
            'resultDS' => $resultDS,
            'allMassF' => $all_massF,
            'allPossibleMassF' => $all_possible_massF,
        ]);
    }
}
