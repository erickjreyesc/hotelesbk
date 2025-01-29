<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Traits\JsonTrait;
use App\Transformers\HabitacionHotelTransformer;
use App\Transformers\HotelTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class HotelApiController extends Controller
{
    use JsonTrait;

    protected $fractal;

    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Hotel::with('ciudad.departamento', 'habitaciones', 'habitacionesHotel')->get();

        foreach ($results as $hotel) {
            $hotel->cantidad_habitaciones = $hotel->habitacionesHotel->sum('cantidad');
        }

        $fractal = new Manager();

        $resource = new Collection($results, new HotelTransformer());

        return response()->json($fractal->createData($resource)->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'departamento_id',
                'ciudad_id',
                'nombre',
                'direccion',
                'estado',
                'nit',
                'totalhab'
            ]);

            $validator = Validator::make($data, [
                'nombre' => 'required|min:2|max:200|unique:hoteles,nombre',
                'departamento_id' => 'required|exists:departamentos,id',
                'ciudad_id' => 'required|exists:ciudades,id',
                'direccion' => 'required|min:2',
                'nit' => 'required|regex:/^\d{8}-\d$/',
                'descripcion' => 'nullable|min:2|max:200',
                'estado' => 'nullable|boolean',
                'totalhab' => 'required|integer|between:0,1000'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            $hotel = Hotel::create($data);
            return $this->response(200, 'Elemento creado exitosamente', $hotel->id);
        } catch (\Throwable $th) {
            return $this->error(419, 'Hubo un error al crear el recurso: ' . $th->getMessage(), $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($hotele)
    {
        // Buscar el hotel por el element_id
        // Buscar el hotel por el element_id
        $hotel = Hotel::with('habitacionesHotel.habitacion', 'habitacionesHotel.acomodacion')->find($hotele);

        if ($hotel) {
            // Transformar los datos del hotel
            $resource = new Item($hotel, new HotelTransformer());
            $hotelData = $this->fractal->createData($resource)->toArray();

            // Transformar las habitaciones del hotel
            $habitacionesCollection = $hotel->habitacionesHotel; // Obtener la colección
            $habitacionesResource = new Collection($habitacionesCollection, new HabitacionHotelTransformer());
            $habitacionesData = $this->fractal->createData($habitacionesResource)->toArray();

            // Agregar las habitaciones al resultado del hotel
            $hotelData['data']['habitaciones'] = $habitacionesData['data'];

            // Retornar los datos del hotel en formato JSON
            return response()->json($hotelData);
        } else {
            // Retornar un error si el hotel no se encuentra
            return response()->json(['error' => 'Hotel no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $hotel = Hotel::findOrFail($id);

            $data = $request->only([
                'departamento_id',
                'ciudad_id',
                'nombre',
                'direccion',
                'estado',
                'nit',
                'totalhab'
            ]);

            $validator = Validator::make($data, [
                'nombre' => [
                    'required',
                    'min:2',
                    'max:200',
                    Rule::unique('hoteles', 'nombre')->ignore($hotel->id, 'id')->whereNull('deleted_at')
                ],
                'departamento_id' => 'required|exists:departamentos,id',
                'ciudad_id' => 'required|exists:ciudades,id',
                'direccion' => 'required|min:2',
                'telefono' => 'required|phone:CO',
                'nit' => 'required|regex:/^\d{8}-\d$/',
                'descripcion' => 'nullable|min:2|max:200',
                'correo' => [
                    'nullable', 'email',
                ],
                'estado' => 'nullable|boolean',
                'totalhab' => 'required|integer|between:0,1000'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

            $hotel->fill($data);
            $hotel->save();
            return $this->response(200, 'Elemento actualizado exitosamente', $hotel->id);
        } catch (\Throwable $th) {
            return $this->error(419, 'Hubo un error al actualizar el recurso', $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->delete();
            return $this->response(200, 'Elemento eliminado exitosamente');
        } catch (\Throwable $th) {
            return $this->error(404, 'El recurso no existe', $th);
        }
    }

    public function change(Hotel $hotel)
    {
        try {
            $valor = $hotel->estado ? 0 : 1;
            $hotel->fill([
                'estado' => $valor
            ])->save();
            return $this->response(200, 'Cambio de estado exitoso');
        } catch (\Throwable $th) {
            return $this->error(404, 'El recurso no existe', $th);
        }
    }
}
