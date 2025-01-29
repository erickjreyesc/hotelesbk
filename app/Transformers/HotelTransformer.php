<?php

namespace App\Transformers;

use App\Models\HabitacionHotel;
use App\Models\Hotel;
use League\Fractal\TransformerAbstract;

class HotelTransformer extends TransformerAbstract
{
    protected array $defaultIncludes = [
        'ciudad', 'habitaciones'
    ];

    public function transform(Hotel $hotel)
    {
        return [
            'id' => $hotel->id,
            'nombre' => $hotel->nombre,
            'direccion' => $hotel->direccion,
            'estado' => $hotel->estado,
            'nit' => $hotel->nit,
            'totalhab' => $hotel->totalhab,
            'cargados' => $hotel->cantidad_habitaciones
        ];
    }

    public function includeCiudad(Hotel $hotel)
    {
        return $this->item($hotel->ciudad, new CiudadTransformer());
    }

    public function includeHabitaciones(Hotel $hotel)
    {
        $habitaciones = $hotel->habitacionesHotel;
        return $this->collection($habitaciones, new HabitacionHotelTransformer());
    }
}
