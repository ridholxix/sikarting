<?php

namespace Database\Seeders;

use App\Models\Stunting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StuntingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stuntings = collect([
            [
                'kode' => 'S001',
                'nama' => 'Tidak Stunting',
                'prior' => 0.784
            ],
            [
                'kode' => 'S002',
                'nama' => 'Stunting',
                'prior' => 0.135
            ],
            [
                'kode' => 'S003',
                'nama' => 'Stunting Berat',
                'prior' => 0.081
            ],
        ]);

        $stuntings->each(function($stunting){
            Stunting::create($stunting);
        });
    }
}
