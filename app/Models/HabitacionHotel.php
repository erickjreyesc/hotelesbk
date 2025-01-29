<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitacionHotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'habitacion_hotel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hotel_id', 'habitacion_id', 'acomodacion_id', 'canthab'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }

    public function acomodacion()
    {
        return $this->belongsTo(Acomodacion::class);
    }
}
