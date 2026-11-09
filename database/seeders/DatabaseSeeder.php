<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AsramaSeeder::class,
            KamarSeeder::class,
            SantriSeeder::class,
            PembayaranSeeder::class,
            AbsensiSeeder::class,
            UserSeeder::class,
        ]);
    }
}
