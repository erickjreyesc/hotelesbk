<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'ciudad_id', 'id');
    }
}
