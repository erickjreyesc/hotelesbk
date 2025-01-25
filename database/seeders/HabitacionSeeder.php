<?php

namespace Database\Seeders;

use App\Models\Habitacion;
use Illuminate\Database\Seeder;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'nombre' => 'Estándar',
            'descripcion' => 'Habitación estándar',
            'boolean' => 1,
        ],[
            'nombre' => 'Junior',
            'descripcion' => 'Habitación junior',
            'boolean' => 1,
        ],[
            'nombre' => 'Suite',
            'descripcion' => 'Habitación suite',
            'boolean' => 1,
        ]);

        foreach ($data as $dato) {
            Habitacion::create($dato);
        }
    }
}
