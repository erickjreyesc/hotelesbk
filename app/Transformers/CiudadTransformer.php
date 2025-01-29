<?php

namespace App\Transformers;

use App\Models\Ciudad;
use League\Fractal\TransformerAbstract;

class CiudadTransformer extends TransformerAbstract
{
    protected array $defaultIncludes = [
        'departamento'
    ];

    public function transform(Ciudad $ciudad)
    {
        return [
            'id' => $ciudad->id,
            'nombre' => $ciudad->nombre,
        ];
    }

    public function includeDepartamento(Ciudad $ciudad)
    {
        return $this->item($ciudad->departamento, new DepartamentoTransformer());
    }

}
