<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hoteles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'compania_id',
        'ciudad_id',
        'nombre',
        'direccion',
        'telefono',
        'correo',
        'estado',
        'nit'
    ];

    public function compania()
    {
        return $this->belongsTo(Compania::class, 'compania_id', 'id');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'id');
    }

    public function acomodaciones()
    {
        return $this->belongsToMany(Acomodacion::class, 'habitacion_hotel', 'acomodacion_id', 'hotel_id');
    }

    public function habitaciones()
    {
        return $this->belongsToMany(Habitacion::class, 'habitacion_hotel', 'habitacion_id', 'hotel_id');
    }
}
