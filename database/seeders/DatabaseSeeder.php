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
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            HabitacionSeeder::class,
            AcomodacionSeeder::class,
            HotelSeeder::class
        ]);
    }
}
