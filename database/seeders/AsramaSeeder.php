<?php

namespace Database\Seeders;

use App\Models\Asrama;
use Illuminate\Database\Seeder;

class AsramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        $namaAsrama = ['Asrama Al-Fatih', 'Asrama Ar-Rahman', 'Asrama Al-Amin', 'Asrama Nurul Iman', 'Asrama Al-Hikmah'];

        foreach ($namaAsrama as $nama) {
            Asrama::create([
                'nama_asrama' => $nama,
                'gedung'      => 'Gedung ' . $faker->randomLetter() . $faker->numberBetween(1, 3),
                'alamat'      => $faker->address(),
            ]);
        }
    }
}
