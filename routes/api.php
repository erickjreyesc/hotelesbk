<?php

use App\Http\Controllers\Api\AcomodacionApiController;
use App\Http\Controllers\Api\CiudadApiController;
use App\Http\Controllers\Api\DepartamentoApiController;
use App\Http\Controllers\Api\HabitacionApiController;
use App\Http\Controllers\Api\HotelApiController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'acomodaciones' => AcomodacionApiController::class,
    'habitaciones' => HabitacionApiController::class,
    'hoteles' => HotelApiController::class
]);

Route::get('/departamentos', [DepartamentoApiController::class, 'index']);
Route::get('/ciudad/departamento/{departamento}', [CiudadApiController::class, 'ciudadByDepartamento']);

Route::get('/acomodaciones/cambiar/{acomodacione}', [AcomodacionApiController::class, 'change']);
