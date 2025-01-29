<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HabitacionHotel;
use App\Traits\JsonTrait;
use App\Transformers\HabitacionHotelTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class HotelHabitacionApiController extends Controller
{
    use JsonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index($hotel)
    {
        $results = HabitacionHotel::where('hotel_id', $hotel)->get();
        $fractal = new Manager();
        $resource = new Collection($results, new HabitacionHotelTransformer());
        return response()->json($fractal->createData($resource)->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'hotel_id',
                'habitacion_id',
                'acomodacion_id',
                'canthab'
            ]);

            $validator = Validator::make($data, [
                'hotel_id' => 'required|exists:hoteles,id',
                'habitacion_id' => 'required|exists:habitaciones,id',
                'acomodacion_id' => 'required|exists:acomodaciones,id',
                'totalhab' => [
                    'required' | 'integer'
                ]
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            $hotel = HabitacionHotel::create($data);
            return $this->response(200, 'Elemento creado exitosamente');
        } catch (\Throwable $th) {
            if($th->getCode() == 23505){
                return $this->error(419, 'Ya se encuentra un registro con las mismas caracteristicas.', $th);
            }
            return $this->error(419, 'Hubo un error al crear el recurso: ' . $th->getMessage(), $th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $hhotel = HabitacionHotel::find($id);

            $data = $request->only([
                'hotel_id',
                'habitacion_id',
                'acomodacion_id',
                'canthab'
            ]);

            $validator = Validator::make($data, [
                'hotel_id' => 'required|exists:hoteles,id',
                'habitacion_id' => 'required|exists:habitaciones,id',
                'acomodacion_id' => 'required|exists:acomodaciones,id',
                'totalhab' => [
                    'required' | 'integer'
                ]
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            $hhotel->fill($data);
            $hhotel->save();
            return $this->response(200, 'Elemento actualizado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(419, 'Hubo un error al crear el recurso: ' . $th->getMessage(), $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hhotel = HabitacionHotel::find($id);
        $hhotel->delete();
        return $this->response(200, 'Elemento nro. ' . $hhotel->id . ' eliminado exitosamente');
    }

    public function contador($hotel)
    {
        return $this->response(200, HabitacionHotel::where('hotel_id', $hotel)->sum('canthab'));
    }

    public function contadorLog($hotel)
    {
        return $this->response(200, HabitacionHotel::find($hotel)->canthab);
    }
}
