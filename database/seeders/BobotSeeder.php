<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Stunting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bobot = [
            ['gejala'  => 'G001','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G001','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G002','stunting'  => 'S002','probabilitas' => 0.9],
            ['gejala'  => 'G002','stunting'  => 'S003','probabilitas' => 0.9],
            ['gejala'  => 'G003','stunting'  => 'S002','probabilitas' => 0.9],
            ['gejala'  => 'G003','stunting'  => 'S003','probabilitas' => 0.9],
            ['gejala'  => 'G004','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G004','stunting'  => 'S003','probabilitas' => 0.9],
            ['gejala'  => 'G005','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G005','stunting'  => 'S003','probabilitas' => 0.7],
            ['gejala'  => 'G006','stunting'  => 'S001','probabilitas' => 0.5],
            ['gejala'  => 'G006','stunting'  => 'S003','probabilitas' => 0.5],
            ['gejala'  => 'G007','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G007','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G008','stunting'  => 'S002','probabilitas' => 0.9],
            ['gejala'  => 'G008','stunting'  => 'S003','probabilitas' => 0.9],
            ['gejala'  => 'G009','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G009','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G010','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G010','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G011','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G011','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G012','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G012','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G013','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G013','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G014','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G014','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G015','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G015','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G016','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G016','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G017','stunting'  => 'S002','probabilitas' => 0.7],
            ['gejala'  => 'G017','stunting'  => 'S003','probabilitas' => 0.7],
            ['gejala'  => 'G018','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G018','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G019','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G019','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G020','stunting'  => 'S002','probabilitas' => 0.7],
            ['gejala'  => 'G020','stunting'  => 'S003','probabilitas' => 0.7],
            ['gejala'  => 'G021','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G021','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G022','stunting'  => 'S002','probabilitas' => 0.7],
            ['gejala'  => 'G022','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G023','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G023','stunting'  => 'S003','probabilitas' => 0.5],
            ['gejala'  => 'G024','stunting'  => 'S001','probabilitas' => 0.5],
            ['gejala'  => 'G024','stunting'  => 'S002','probabilitas' => 0.5],
            ['gejala'  => 'G025','stunting'  => 'S001','probabilitas' => 0.6],
            ['gejala'  => 'G026','stunting'  => 'S001','probabilitas' => 0.5],
            ['gejala'  => 'G026','stunting'  => 'S002','probabilitas' => 0.5],
            ['gejala'  => 'G027','stunting'  => 'S002','probabilitas' => 0.7],
            ['gejala'  => 'G027','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G028','stunting'  => 'S002','probabilitas' => 0.7],
            ['gejala'  => 'G028','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G029','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G029','stunting'  => 'S003','probabilitas' => 0.5],
            ['gejala'  => 'G030','stunting'  => 'S001','probabilitas' => 0.5],
            ['gejala'  => 'G030','stunting'  => 'S002','probabilitas' => 0.5],
            ['gejala'  => 'G030','stunting'  => 'S003','probabilitas' => 0.5],
            ['gejala'  => 'G031','stunting'  => 'S001','probabilitas' => 0.5],
            ['gejala'  => 'G031','stunting'  => 'S002','probabilitas' => 0.5],
            ['gejala'  => 'G031','stunting'  => 'S003','probabilitas' => 0.5],
            ['gejala'  => 'G032','stunting'  => 'S001','probabilitas' => 0.6],
            ['gejala'  => 'G033','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G033','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G034','stunting'  => 'S001','probabilitas' => 0.6],
            ['gejala'  => 'G035','stunting'  => 'S002','probabilitas' => 0.7],
            ['gejala'  => 'G035','stunting'  => 'S003','probabilitas' => 0.7],
            ['gejala'  => 'G036','stunting'  => 'S001','probabilitas' => 0.6],
            ['gejala'  => 'G037','stunting'  => 'S001','probabilitas' => 0.7],
            ['gejala'  => 'G038','stunting'  => 'S001','probabilitas' => 0.6],
            ['gejala'  => 'G039','stunting'  => 'S001','probabilitas' => 0.5],
            ['gejala'  => 'G039','stunting'  => 'S002','probabilitas' => 0.5],
            ['gejala'  => 'G039','stunting'  => 'S003','probabilitas' => 0.5],
            ['gejala'  => 'G040','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G040','stunting'  => 'S003','probabilitas' => 0.6],
            ['gejala'  => 'G041','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G041','stunting'  => 'S003','probabilitas' => 0.5],
            ['gejala'  => 'G042','stunting'  => 'S002','probabilitas' => 0.7],
            ['gejala'  => 'G042','stunting'  => 'S003','probabilitas' => 0.7],
            ['gejala'  => 'G043','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G043','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G044','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G044','stunting'  => 'S003','probabilitas' => 0.8],
            ['gejala'  => 'G045','stunting'  => 'S002','probabilitas' => 0.8],
            ['gejala'  => 'G045','stunting'  => 'S003','probabilitas' => 0.9],
            ['gejala'  => 'G046','stunting'  => 'S002','probabilitas' => 0.6],
            ['gejala'  => 'G046','stunting'  => 'S003','probabilitas' => 0.7],
        ];

        $iteration = 1;
        foreach($bobot as $prob){
            $kode = "GS" . str_pad($iteration, 3, '0', STR_PAD_LEFT);
            Gejala::where('kode', $prob['gejala'])->first()->stuntings()->attach(Stunting::where('kode', $prob['stunting'])->first(), [
                'probabilitas' => $prob['probabilitas'],
                'kode' => $kode
            ]);
            $iteration++;
        }
    }
}
