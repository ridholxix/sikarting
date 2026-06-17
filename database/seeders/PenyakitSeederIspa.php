<?php

namespace Database\Seeders;

use App\Models\Stunting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeederIspa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyakits = [
            'S001' => 'Common Cold/Batuk Pilek',
            'S002' => 'Radang Tenggorokan Akut',
            'S003' => 'Laringitis',
            'S004' => 'Bronkitis',
            'S005' => 'Pneumonia',
            'S006' => 'Epiglotitis',
        ];

        $prior = 1 / count($penyakits);

        foreach($penyakits as $kode => $nama_penyakit){
            Stunting::create([
                'kode' => $kode,
                'nama' => $nama_penyakit,
                'prior' => $prior,
            ]);
        }
    }
}
