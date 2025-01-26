<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Acomodacion;
use App\Traits\JsonTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AcomodacionApiController extends Controller
{
    use JsonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Acomodacion::all();
        return $this->response(200, $results);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'nombre',
                'descripcion',
                'estado'
            ]);

            $validator = Validator::make($data, [
                'nombre' => 'required|min:2|max:200|unique:acomodaciones,nombre',
                'descripcion' => 'nullable|min:2|max:200',
                'estado' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            Acomodacion::create($data);
            return $this->response(200, 'Elemento creado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(419, 'Hubo un error al crear el recurso: ' . $th->getMessage(), $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Acomodacion $acomodacione)
    {
        return $this->response(200, $acomodacione);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acomodacion $acomodacione)
    {
        try {
            $data = $request->only([
                'nombre',
                'descripcion',
                'estado'
            ]);

            $validator = Validator::make($data, [
                'nombre' => [
                    'required',
                    'min:2',
                    'max:200',
                    Rule::unique('acomodaciones', 'nombre')->ignore($acomodacione->id, 'id')->whereNull('deleted_at')

                ],
                'descripcion' => 'nullable|min:2|max:200',
                'estado' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            $acomodacione->fill($data)->save();
            return $this->response(200, 'Elmento actualizado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(419, 'Hubo un error al actualizar el recurso: ' . $th->getMessage(), $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acomodacion $acomodacione)
    {
        try {
            $acomodacione->delete();
            return $this->response(200, 'Elemento eliminado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(404, 'El recurso no existe', $th);
        }
    }

    public function change(Acomodacion $acomodacione)
    {
        try {
            $valor = $acomodacione->estado ? 0 : 1;
            $acomodacione->fill([
                'estado' => $valor
            ])->save();
            return $this->response(200, 'Cambio de estado exitoso');
        } catch (\Throwable $th) {
            return $this->error(404, 'El recurso no existe', $th);
        }
    }
}
