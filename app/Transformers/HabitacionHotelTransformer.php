<?php

namespace App\Transformers;

use App\Models\HabitacionHotel;
use League\Fractal\TransformerAbstract;

class HabitacionHotelTransformer extends TransformerAbstract
{
    protected array $defaultIncludes = [
        'habitacion',
        'acomodacion'
    ];

    public function transform(HabitacionHotel $habitacionHotel)
    {
        return [
            'id' => $habitacionHotel->id,
            'canthab' => $habitacionHotel->canthab,
        ];
    }

    public function includeHabitacion(HabitacionHotel $habitacionHotel)
    {
        $habitacion = $habitacionHotel->habitacion;
        return $this->item($habitacion, new HabitacionTransformer());
    }

    public function includeAcomodacion(HabitacionHotel $habitacionHotel)
    {
        $acomodacion = $habitacionHotel->acomodacion;
        return $this->item($acomodacion, new AcomodacionTransformer());
    }
}
