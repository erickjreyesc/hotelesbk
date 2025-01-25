<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            ['nombre' => "AMAZONAS"],
            ['nombre' => "ANTIOQUIA"],
            ['nombre' => "ARAUCA"],
            ['nombre' => "ATLÁNTICO"],
            ['nombre' => "BOGOTÁ DC"],
            ['nombre' => "BOLÍVAR"],
            ['nombre' => "BOYACÁ"],
            ['nombre' => "CALDAS"],
            ['nombre' => "CAQUETÁ"],
            ['nombre' => "CASANARE"],
            ['nombre' => "CAUCA"],
            ['nombre' => "CESAR"],
            ['nombre' => "CHOCÓ"],
            ['nombre' => "CÓRDOBA"],
            ['nombre' => "CUNDINAMARCA"],
            ['nombre' => "GUAINÍA"],
            ['nombre' => "GUAVIARE"],
            ['nombre' => "HUILA"],
            ['nombre' => "LA GUAJIRA"],
            ['nombre' => "MAGDALENA"],
            ['nombre' => "META"],
            ['nombre' => "NARIÑO"],
            ['nombre' => "NORTE DE SANTANDER"],
            ['nombre' => "PUTUMAYO"],
            ['nombre' => "QUINDÍO"],
            ['nombre' => "RISARALDA"],
            ['nombre' => "SAN ANDRÉS => VIDENCIA Y SANTA CATALINA"],
            ['nombre' => "SANTANDER"],
            ['nombre' => "SUCRE"],
            ['nombre' => "TOLIMA"],
            ['nombre' => "VALLE DEL CAUCA"],
            ['nombre' => "VAUPÉS"],
            ['nombre' => "VICHADA"], //33
        );
        foreach ($data as $dato) {
            Departamento::create($dato);
        }
    }
}
