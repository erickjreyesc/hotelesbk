<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

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
        'ciudad_id',
        'nombre',
        'direccion',
        'estado',
        'nit',
        'totalhab'
    ];

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

    public function habitacionesHotel()
    {
        return $this->hasMany(HabitacionHotel::class);
    }
}
