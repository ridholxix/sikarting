<?php

namespace App\Http\Controllers;

use App\Models\Stunting;

class DempsterShaferController extends Controller
{
    private static $_arrMassF = [];
    private static $_zero_fod_value = 0;

    private static array $_all_massF = [];

    private static array $_all_possible_massF = [];

    private static $recursive_counter = 0;

    public static function create(Array $massF){
        self::$_arrMassF = $massF;
        // dd(self::$_arrMassF);
        if(count($massF) == 1){
            self::$_arrMassF = self::$_arrMassF[0];
            self::getProbPercent();
            return self::$_arrMassF;
            // dd(self::$_arrMassF, $massF);
        }

        // self::$_all_massF[] = $massF[0];

        // dd(self::$_arrMassF);
        return self::massFunction();
    }

    public static function getAllMassF(){
        return self::$_all_massF;
    }

    public static function getAllPossibleMassF(){
        return self::$_all_possible_massF;
    }

    private static function solveDuplicate($fod){
        $buffer_fod = [];

        self::$_all_possible_massF[] = $fod;

        foreach($fod as $data){
            if(empty($data['frame_of_discerment'])){
                // dd("OKOK",  $data, $fod);
                self::$_zero_fod_value += $data['mass_belief'];
                continue;
            }

            sort($data['frame_of_discerment']);

            // dump(implode('#',$data['frame_of_discerment']));

            if(!isset($buffer_fod[implode('#',$data['frame_of_discerment'])])){
                $buffer_fod[implode('#',$data['frame_of_discerment'])] = $data['mass_belief'];
                // dd($buffer_fod);
            } else {
                $buffer_fod[implode('#',$data['frame_of_discerment'])] += $data['mass_belief'];
            }
        }

        // dd($fod, $buffer_fod);

        // if(self::$_zero_fod_value != 0 && abs(array_sum($buffer_fod) - 1) > 0.00001){
            foreach($buffer_fod as $frame_of_discerment => $massBelief){
                $buffer_fod[$frame_of_discerment] = $massBelief / (1 - self::$_zero_fod_value);
                // dump(self::$_zero_fod_value, $fod, $buffer_fod);
            }
            // dd($buffer_fod, (array_sum($buffer_fod)));
        // }

        self::$_zero_fod_value = 0;

        // dd(self::$_zero_fod_value, $fod, $buffer_fod);

        $current_massF['gejala_id'] = 'gejala_id';

        $massF_number = 0;
        foreach($buffer_fod as $frame_of_discerment => $mass_belief){
            $massF_number++;
            $current_fod = explode('#',$frame_of_discerment);
            $current_massF[$massF_number] = [
                'mass_belief' => $mass_belief,
                'frame_of_discerment' => $current_fod,
            ];
        }

        $total = array_sum($buffer_fod);

        // dd($total);

        if(abs($total - 1) > 0.00001){
            dd("ADA YANG ERROR", $buffer_fod, $fod, $current_fod, array_sum($buffer_fod), self::$_zero_fod_value);
        }

        // dump($buffer_fod, $current_massF, self::$_arrMassF);

        array_unshift(self::$_arrMassF, $current_massF);

        // if(self::$recursive_counter >= 43){
        //     debug(self::$_arrMassF, $current_massF);
        // }

        // dd($buffer_fod, $current_massF, self::$_arrMassF);
    }

    private static function massFunction(){
        $massF_x = array_shift(self::$_arrMassF);
        $massF_y = array_shift(self::$_arrMassF);

        self::$_all_massF[] = $massF_x;
        self::$_all_massF[] = $massF_y;

        foreach($massF_y as $key => $mass){
            if($key != 'gejala_id' && (!isset($mass['mass_belief']) || $mass['mass_belief'] == 'null')){
                dd("ADA YANG ERROR: tidak ada mass_belief, di mungkinkan karena ada gejala yang tidak memiliki relasi stuntings (dari user)", $massF_x, $massF_y);
            }
        }

        // dd($massF_x, $massF_y);

        $buffer_fod = [];


        if(self::$recursive_counter >= 45){
            debug($massF_x, $massF_y);
        }

        for($i = 1; $i < count($massF_x); $i++){
            for($j = 1; $j < count($massF_y); $j++){
                if($massF_x[$i]['frame_of_discerment'] == ['theta'] || $massF_y[$j]['frame_of_discerment'] == ['theta'] ){
                    $current_fod = ['theta'];
                } else {
                    $current_fod = array_intersect($massF_x[$i]['frame_of_discerment'], $massF_y[$j]['frame_of_discerment']);
                }
                $buffer_fod[] = [
                    'mass_belief' => $massF_x[$i]['mass_belief'] * $massF_y[$j]['mass_belief'],
                    'frame_of_discerment' => $current_fod
                ];
            }
        }

        // dd($massF_x, $massF_y, $buffer_fod);

        self::solveDuplicate($buffer_fod);

        // dd(self::$_arrMassF, self::$_all_massF);

        if(count(self::$_arrMassF) > 1){
            self::$recursive_counter++;
            return self::massFunction();
        }

        // dd(self::$_arrMassF, self::$_all_massF);

        self::$_arrMassF = self::$_arrMassF[0];

        self::$_all_massF[] = self::$_arrMassF;

        return self::getProbPercent();
    }

    private static function getProbPercent(){
        $buffer_var = [];

        // dd(self::$_arrMassF);

        for($i = 1; $i < count(self::$_arrMassF); $i++){
            if(count(self::$_arrMassF[$i]['frame_of_discerment']) > 1){
                self::$_arrMassF[$i]['frame_of_discerment'] = [implode('#', self::$_arrMassF[$i]['frame_of_discerment'])];
            }

            $buffer_var[self::$_arrMassF[$i]['frame_of_discerment'][0]] = [
                 'percent' => self::$_arrMassF[$i]['mass_belief'] * 100
            ];

            // dd($buffer_var);

            if(count(explode('#', array_keys($buffer_var, true)[$i-1])) > 1){
                // $buffer_var[self::$_arrMassF[$i][1][0]]['id'] = explode('#', array_keys($buffer_var, true)[$i-1]);
                $arrNama = [];
                $arrKode = [];
                foreach(explode('#', array_keys($buffer_var, true)[$i-1]) as $data){
                    $arrNama[] = Stunting::find($data)->nama;
                    $arrKode[] = Stunting::find($data)->kode;
                }

                // dd(self::$_arrMassF);
                $buffer_var[self::$_arrMassF[$i]['frame_of_discerment'][0]]['nama'] = implode(' atau ', $arrNama);
                $buffer_var[self::$_arrMassF[$i]['frame_of_discerment'][0]]['kode'] = implode(', ', $arrKode);

                // dd(self::$_arrMassF, $buffer_var);
            }
            // dd($buffer_var);
        }


        if(self::$_zero_fod_value > 0){
            $buffer_var['empty'] = [
                'percent' => self::$_zero_fod_value * 100
            ];
        }

        self::$_arrMassF = $buffer_var;

        // dd($buffer_var);

        // dd(self::$_arrMassF);

        return self::$_arrMassF;
    }
}
