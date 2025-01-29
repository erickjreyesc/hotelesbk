<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'ciudad_id' => '176',
            'nombre' => 'DECAMERON CARTAGENA',
            'direccion' => 'CALLE 23 58-25',
            'estado' => 1,
            'nit' => '12345678-9',
            'totalhab' => 42
        ]);

        foreach ($data as $dato) {
            Hotel::create($dato);
        }
    }
}
