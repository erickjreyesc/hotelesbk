<?php

namespace Database\Seeders;

use App\Models\Compania;
use Illuminate\Database\Seeder;

class CompaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'nombre' => 'HOTELES DECAMERON DE COLOMBIA',
        ]);

        foreach ($data as $dato) {
            Compania::create($dato);
        }
    }
}
