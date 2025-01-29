<?php

use App\Http\Controllers\Api\AcomodacionApiController;
use App\Http\Controllers\Api\CiudadApiController;
use App\Http\Controllers\Api\DepartamentoApiController;
use App\Http\Controllers\Api\HabitacionApiController;
use App\Http\Controllers\Api\HotelApiController;
use App\Http\Controllers\Api\HotelHabitacionApiController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'acomodaciones' => AcomodacionApiController::class,
    'habitaciones' => HabitacionApiController::class,
    'hoteles' => HotelApiController::class,
]);

Route::get('hotel/habitaciones/listar/{hotel}', [HotelHabitacionApiController::class, 'index']);
Route::post('hotel/habitaciones', [HotelHabitacionApiController::class, 'store']);
Route::put('hotel/habitaciones/{id}', [HotelHabitacionApiController::class, 'update']);
Route::delete('hotel/habitaciones/{id}', [HotelHabitacionApiController::class, 'destroy']);
Route::get('hotel/habitaciones/contador/{hotel}', [HotelHabitacionApiController::class, 'contador']);
Route::get('hotel/habitacion/contador/{hotel}', [HotelHabitacionApiController::class, 'contadorlog']);

Route::get('/departamentos', [DepartamentoApiController::class, 'index']);
Route::get('/habitacion/acomodaciones/{habitacion}', [HabitacionApiController::class, 'acomodaciones']);
Route::get('/ciudad/departamento/{departamento}', [CiudadApiController::class, 'ciudadByDepartamento']);
Route::get('/ciudad/nombre/{ciudad}', [CiudadApiController::class, 'ciudadNombrePorId']);
Route::get('/acomodaciones/cambiar/{acomodacione}', [AcomodacionApiController::class, 'change']);
