<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CiudadPorDepartamentoRequest;
use App\Models\Ciudad;
use App\Traits\JsonTrait;
use Illuminate\Http\Request;

class CiudadApiController extends Controller
{
    use JsonTrait;

    public function ciudadByDepartamento($departamento)
    {
        try {
            $results = Ciudad::where('departamento_id', $departamento)->get(['id', 'nombre']);
            return $this->response(200, $results);
        } catch (\Throwable $th) {
            return $this->error(422, 'Hubo un error al consultar los datos', $th);
        }
    }
}
