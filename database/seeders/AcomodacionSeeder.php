<?php

namespace Database\Seeders;

use App\Models\Acomodacion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcomodacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'nombre' => 'Sencilla',
            'descripcion' => 'Categoría sencilla',
            'boolean' => 1,
        ], [
            'nombre' => 'Doble',
            'descripcion' => 'Categoría doble',
            'boolean' => 1,
        ], [
            'nombre' => 'Triple',
            'descripcion' => 'Categoría triple',
            'boolean' => 1,
        ], [
            'nombre' => 'Cuádruple',
            'descripcion' => 'Categoría cuadruple',
            'boolean' => 1,
        ]);

        foreach ($data as $dato) {
            Acomodacion::create($dato);
        }

        $habitaciones = array([
            'habitacion_id' => 1,
            'acomodacion_id' => 1,
        ], [
            'habitacion_id' => 1,
            'acomodacion_id' => 2,
        ], [
            'habitacion_id' => 2,
            'acomodacion_id' => 3,
        ], [
            'habitacion_id' => 2,
            'acomodacion_id' => 4,
        ], [
            'habitacion_id' => 3,
            'acomodacion_id' => 1,
        ], [
            'habitacion_id' => 3,
            'acomodacion_id' => 2,
        ], [
            'habitacion_id' => 3,
            'acomodacion_id' => 3,
        ]);

        foreach ($habitaciones as $habitacion) {
            DB::insert('insert into categoria_habitacion (habitacion_id,acomodacion_id, created_at, updated_at) values (?, ?, ?, ?)', [
                $habitacion['habitacion_id'],
                $habitacion['acomodacion_id'],
                Carbon::now(),
                Carbon::now(),
            ]);
        }
    }
}
