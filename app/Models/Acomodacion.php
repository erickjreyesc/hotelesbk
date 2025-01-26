<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acomodacion extends Model
{
    use SoftDeletes;

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
        'estado'
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
