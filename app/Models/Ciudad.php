<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ciudades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['departamento_id', 'nombre'];
}
