<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'habitaciones';

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

    public function acomodaciones()
    {
        return $this->belongsToMany(Acomodacion::class, 'categoria_habitacion', 'acomodacion_id', 'habitacion_id');
    }

    public function hoteles()
    {
        return $this->belongsToMany(Hotel::class, 'habitacion_hotel', 'hotel_id', 'acomodacion_id');
    }
}
