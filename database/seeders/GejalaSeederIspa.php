<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeederIspa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gejalas = [
            'G001' => 'Bersin Bersin',
            'G002' => 'Batuk',
            'G003' => 'Pilek',
            'G004' => 'Berkurangnya Indra Penciuman',
            'G005' => 'Suara Serak',
            'G006' => 'Tenggorokan Gatal',
            'G007' => 'Pusing/Sakit Kepala',
            'G008' => 'Demam',
            'G009' => 'Sakit Tenggorokan',
            'G010' => 'Sulit Menelan',
            'G011' => 'Sesak Nafas/Kesulitan Bernafas',
            'G012' => 'Sakit/Rasa Tidak Nyaman Pada Dada',
            'G013' => 'Nyeri Dibagian dada atau perut',
            'G014' => 'Kejang',
            'G015' => 'Mengeluarkan Bunyi Saat Bernafas',
            'G016' => 'Linglung/Terjadi Penurunan Kesadaran',
            'G017' => 'Drooling/Air Liur Keluar Berlebihan',
            'G018' => 'Diare',
        ];
        
        foreach($gejalas as $kode => $nama_gejala){
            Gejala::create([
                'kode' => $kode,
                'nama' => $nama_gejala,
            ]);
        }
    }
}
