<?php

namespace App\Transformers;

use App\Models\Acomodacion;
use League\Fractal\TransformerAbstract;

class AcomodacionTransformer extends TransformerAbstract
{
    public function transform(Acomodacion $acomodacion)
    {
        return [
            'id' => $acomodacion->id,
            'nombre' => $acomodacion->nombre,
        ];
    }
}
