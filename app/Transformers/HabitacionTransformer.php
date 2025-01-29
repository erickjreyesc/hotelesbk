<?php

namespace App\Transformers;

use App\Models\Habitacion;
use League\Fractal\TransformerAbstract;

class HabitacionTransformer extends TransformerAbstract
{
    public function transform(Habitacion $habitacion)
    {
        return [
            'id' => $habitacion->id,
            'nombre' => $habitacion->nombre,
        ];
    }
}
