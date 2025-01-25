<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acomodacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acomodaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'boolean'
    ];

    public function habitaciones()
    {
        return $this->belongsToMany(Habitacion::class, 'categoria_habitacion', 'habitacion_id', 'acomodacion_id');
    }

    public function hoteles()
    {
        return $this->belongsToMany(Hotel::class, 'habitacion_hotel', 'hotel_id', 'acomodacion_id');
    }

}
