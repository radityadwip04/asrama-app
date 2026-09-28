<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\Santri;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // Ambil semua id santri yang sudah ada (dari SantriSeeder)
        $santriIds = Santri::pluck('id')->toArray();

        $jenisPembayaran = ['SPP Bulanan', 'Uang Makan', 'Uang Gedung', 'Iuran Kesehatan'];

        for ($i = 1; $i <= 5; $i++) {
            Pembayaran::create([
                'santri_id'          => $faker->randomElement($santriIds),
                'tanggal_pembayaran' => $faker->date('Y-m-d'),
                'jenis_pembayaran'   => $faker->randomElement($jenisPembayaran),
                'jumlah'             => $faker->numberBetween(100, 1500) * 1000, // Rp100.000 - Rp1.500.000
                'status'             => $faker->randomElement(['lunas', 'belum lunas']),
                'keterangan'         => $faker->optional()->sentence(),
            ]);
        }
    }
}
