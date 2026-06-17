<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Stunting;
use Illuminate\Database\Seeder;

class GejalaPenyakitSeederIspa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gejala_stunting = [
            ['gejala' => 'G001', 'stunting' => 'S001', 'probabilitas' => 1],
            ['gejala' => 'G001', 'stunting' => 'S002', 'probabilitas' => 0.4],
            ['gejala' => 'G001', 'stunting' => 'S003', 'probabilitas' => 0.6],

            ['gejala' => 'G002', 'stunting' => 'S001', 'probabilitas' => 0.8],
            ['gejala' => 'G002', 'stunting' => 'S002', 'probabilitas' => 0.8],
            ['gejala' => 'G002', 'stunting' => 'S005', 'probabilitas' => 0.8],

            ['gejala' => 'G003', 'stunting' => 'S001', 'probabilitas' => 1],
            ['gejala' => 'G003', 'stunting' => 'S002', 'probabilitas' => 0.4],
            ['gejala' => 'G003', 'stunting' => 'S003', 'probabilitas' => 0],

            ['gejala' => 'G004', 'stunting' => 'S001', 'probabilitas' => 0.8],
            ['gejala' => 'G004', 'stunting' => 'S002', 'probabilitas' => 0.4],

            ['gejala' => 'G005', 'stunting' => 'S003', 'probabilitas' => 1],
            ['gejala' => 'G005', 'stunting' => 'S005', 'probabilitas' => 0.6],
            ['gejala' => 'G005', 'stunting' => 'S006', 'probabilitas' => 0.6],

            ['gejala' => 'G006', 'stunting' => 'S001', 'probabilitas' => 0.8],
            ['gejala' => 'G006', 'stunting' => 'S003', 'probabilitas' => 0.8],
            ['gejala' => 'G006', 'stunting' => 'S005', 'probabilitas' => 0.6],

            ['gejala' => 'G007', 'stunting' => 'S001', 'probabilitas' => 0.6],
            ['gejala' => 'G007', 'stunting' => 'S002', 'probabilitas' => 0.6],
            ['gejala' => 'G007', 'stunting' => 'S004', 'probabilitas' => 0.4],

            ['gejala' => 'G008', 'stunting' => 'S003', 'probabilitas' => 0.8],
            ['gejala' => 'G008', 'stunting' => 'S005', 'probabilitas' => 0.8],
            ['gejala' => 'G008', 'stunting' => 'S006', 'probabilitas' => 0.8],

            ['gejala' => 'G009', 'stunting' => 'S001', 'probabilitas' => 0.8],
            ['gejala' => 'G009', 'stunting' => 'S002', 'probabilitas' => 0.8],
            ['gejala' => 'G009', 'stunting' => 'S006', 'probabilitas' => 1],

            ['gejala' => 'G010', 'stunting' => 'S001', 'probabilitas' => 0.4],
            ['gejala' => 'G010', 'stunting' => 'S002', 'probabilitas' => 0.6],
            ['gejala' => 'G010', 'stunting' => 'S004', 'probabilitas' => 0.4],
            ['gejala' => 'G010', 'stunting' => 'S006', 'probabilitas' => 1],

            ['gejala' => 'G011', 'stunting' => 'S001', 'probabilitas' => 0.4],
            ['gejala' => 'G011', 'stunting' => 'S003', 'probabilitas' => 0.6],
            ['gejala' => 'G011', 'stunting' => 'S005', 'probabilitas' => 0.8],
            ['gejala' => 'G011', 'stunting' => 'S006', 'probabilitas' => 0.8],

            ['gejala' => 'G012', 'stunting' => 'S001', 'probabilitas' => 0.4],
            ['gejala' => 'G012', 'stunting' => 'S003', 'probabilitas' => 0.6],
            ['gejala' => 'G012', 'stunting' => 'S005', 'probabilitas' => 0.8],
            ['gejala' => 'G012', 'stunting' => 'S006', 'probabilitas' => 0.6],

            ['gejala' => 'G013', 'stunting' => 'S003', 'probabilitas' => 1],
            ['gejala' => 'G013', 'stunting' => 'S006', 'probabilitas' => 0.6],

            ['gejala' => 'G014', 'stunting' => 'S003', 'probabilitas' => 0.8],
            ['gejala' => 'G014', 'stunting' => 'S005', 'probabilitas' => 0.6],
            ['gejala' => 'G014', 'stunting' => 'S006', 'probabilitas' => 0.8],

            ['gejala' => 'G015', 'stunting' => 'S001', 'probabilitas' => 0.6],
            ['gejala' => 'G015', 'stunting' => 'S002', 'probabilitas' => 0.4],
            ['gejala' => 'G015', 'stunting' => 'S003', 'probabilitas' => 0.6],
            ['gejala' => 'G015', 'stunting' => 'S006', 'probabilitas' => 0.8],

            ['gejala' => 'G016', 'stunting' => 'S002', 'probabilitas' => 0.4],
            ['gejala' => 'G016', 'stunting' => 'S004', 'probabilitas' => 0.4],
            ['gejala' => 'G016', 'stunting' => 'S006', 'probabilitas' => 0.8],

            ['gejala' => 'G017', 'stunting' => 'S001', 'probabilitas' => 0.7],
            ['gejala' => 'G017', 'stunting' => 'S003', 'probabilitas' => 0.6],
            ['gejala' => 'G017', 'stunting' => 'S005', 'probabilitas' => 0.6],
            ['gejala' => 'G017', 'stunting' => 'S006', 'probabilitas' => 1],

            ['gejala' => 'G018', 'stunting' => 'S002', 'probabilitas' => 0.4],
            ['gejala' => 'G018', 'stunting' => 'S003', 'probabilitas' => 1],
            ['gejala' => 'G018', 'stunting' => 'S005', 'probabilitas' => 0.6],
            ['gejala' => 'G018', 'stunting' => 'S006', 'probabilitas' => 0.8],
        ];

        $iteration = 1;
        foreach ($gejala_stunting as $prob) {
            $kode = 'GS'.str_pad($iteration, 3, '0', STR_PAD_LEFT);
            Gejala::where('kode', $prob['gejala'])->first()->stuntings()->attach(Stunting::where('kode', $prob['stunting'])->first(), [
                'probabilitas' => $prob['probabilitas'],
                'kode' => $kode,
            ]);
            $iteration++;
        }
    }
}
