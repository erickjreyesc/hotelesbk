<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'nit'
    ];
}
