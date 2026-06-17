<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ridho Andira Wibowo',
            'email' => 'ridhoandirawibowo@gmail.com',
            'password' => Hash::make('ridho123'),
        ]);

        $this->call(GejalaSeeder::class);
        $this->call(StuntingSeeder::class);
        $this->call(BobotSeeder::class);

        // $this->call(GejalaSeederIspa::class);
        // $this->call(PenyakitSeederIspa::class);
        // $this->call(GejalaPenyakitSeederIspa::class);
    }
}
