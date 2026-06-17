<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class NaiveBayesController extends Controller
{
    private static $_evidences = [];

    public static function create(Array $evidences)
    {
        // Mengambil nilai Prior (Pr)
        $_prior = Stunting::pluck('prior')->mapWithKeys(function($item, $key){
            return [$key + 1 => $item];
        });

        // Menghitung perkalian Prior dan Evidence
        foreach($evidences as $key => $val){
            $evidences[$key][] = $_prior[$key];
            $evidences[$key] = ['prob_val' => array_product($evidences[$key])];
        }

        self::$_evidences = $evidences;
        return self::getProbPercent();
    }

    private static function getProbPercent(){
        $sumVal = 0;
        foreach(self::$_evidences as $arrVal){
            $sumVal += $arrVal['prob_val'];
        }

        foreach(self::$_evidences as $key => $arrVal){
            self::$_evidences[$key]['percent'] = ($arrVal['prob_val'] / $sumVal * 100);
        }

        return self::$_evidences;
    }
}
