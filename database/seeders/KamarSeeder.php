<?php

namespace Database\Seeders;

use App\Models\Asrama;
use App\Models\Kamar;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // Ambil semua id asrama yang sudah ada (dari AsramaSeeder)
        $asramaIds = Asrama::pluck('id')->toArray();

        // Buat minimal 5 kamar, masing-masing menunjuk ke asrama_id yang valid
        for ($i = 1; $i <= 5; $i++) {
            Kamar::create([
                'asrama_id'   => $faker->randomElement($asramaIds),
                'nomor_kamar' => 'K-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'lantai'      => $faker->numberBetween(1, 3),
                'kapasitas'   => $faker->numberBetween(4, 8),
                'status'      => $faker->randomElement(['tersedia', 'penuh']),
            ]);
        }
    }
}
