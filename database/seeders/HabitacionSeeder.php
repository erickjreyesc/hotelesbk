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
            'estado' => 1,
        ],[
            'nombre' => 'Junior',
            'descripcion' => 'Habitación junior',
            'estado' => 1,
        ],[
            'nombre' => 'Suite',
            'descripcion' => 'Habitación suite',
            'estado' => 1,
        ]);

        foreach ($data as $dato) {
            Habitacion::create($dato);
        }
    }
}
