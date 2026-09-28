<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Santri;
use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // Ambil semua id kamar yang sudah ada (dari KamarSeeder)
        $kamarIds = Kamar::pluck('id')->toArray();

        for ($i = 1; $i <= 5; $i++) {
            Santri::create([
                'kamar_id'      => $faker->randomElement($kamarIds),
                'nis'           => $faker->unique()->numerify('NIS-####'),
                'nama'          => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' => $faker->date('Y-m-d', '2012-01-01'),
                'alamat'        => $faker->address(),
                'no_hp'         => $faker->numerify('08##########'),
                'status'        => 'aktif',
            ]);
        }
    }
}
