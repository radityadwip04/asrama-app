<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Santri;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // Ambil semua id santri yang sudah ada (dari SantriSeeder)
        $santriIds = Santri::pluck('id')->toArray();

        for ($i = 1; $i <= 5; $i++) {
            Absensi::create([
                'santri_id'  => $faker->randomElement($santriIds),
                'tanggal'    => $faker->date('Y-m-d'),
                'status'     => $faker->randomElement(['hadir', 'izin', 'sakit', 'alpha']),
                'keterangan' => $faker->optional()->sentence(),
            ]);
        }
    }
}
