<?php

namespace App\Transformers;

use App\Models\Departamento;
use League\Fractal\TransformerAbstract;

class DepartamentoTransformer extends TransformerAbstract
{
    public function transform(Departamento $departamento)
    {
        return [
            'id' => $departamento->id,
            'nombre' => $departamento->nombre,
        ];
    }
}
