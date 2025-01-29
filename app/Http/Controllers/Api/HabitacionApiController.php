<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use App\Traits\JsonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HabitacionApiController extends Controller
{
    use JsonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Habitacion::all();
        return $this->response(200, $results);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'ciudad_id',
                'nombre',
                'direccion',
                'telefono',
                'correo',
                'estado',
                'nit'
            ]);

            $validator = Validator::make($data, [
                'nombre' => 'required|min:2|max:200|unique:habitaciones,nombre',
                'descripcion' => 'nullable|min:2|max:200',
                'estado' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            Habitacion::create($request->only([
                'ciudad_id',
                'nombre',
                'direccion',
                'telefono',
                'correo',
                'estado',
                'nit'
            ]));
            return $this->response(200, 'Elemento creado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(419, 'Hubo un error al crear el recurso: ' . $th->getMessage(), $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitacion $habitacion)
    {
        return $this->response(200, $habitacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        try {
            $data = $request->only([
                'ciudad_id',
                'nombre',
                'direccion',
                'telefono',
                'correo',
                'estado',
                'nit'
            ]);

            $validator = Validator::make($data, [
                'nombre' => [
                    'required',
                    'min:2',
                    'max:200',
                    Rule::unique('habitaciones', 'nombre')->ignore($habitacion->id, 'id')->whereNull('deleted_at')

                ],
                'descripcion' => 'nullable|min:2|max:200',
                'estado' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            $habitacion->fill($data)->save();
            return $this->response(200, 'Elmento actualizado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(419, 'Hubo un error al actualizar el recurso', $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitacion $habitacion)
    {
        try {
            $habitacion->delete();
            return $this->response(200, 'Elemento eliminado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(404, 'El recurso no existe', $th);
        }
    }

    public function change(Habitacion $habitacion)
    {
        try {
            $valor = $habitacion->estado ? 0 : 1;
            $habitacion->fill([
                'estado' => $valor
            ])->save();
            return $this->response(200, 'Cambio de estado exitoso');
        } catch (\Throwable $th) {
            return $this->error(404, 'El recurso no existe', $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function acomodaciones($habitacion)
    {
        $results = Habitacion::find($habitacion);
        return $this->response(200, $results->acomodaciones);
    }
}
