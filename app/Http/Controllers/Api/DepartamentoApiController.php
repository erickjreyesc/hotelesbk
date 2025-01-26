<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Traits\JsonTrait;

class DepartamentoApiController extends Controller
{
    use JsonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Departamento::orderby('nombre')->get(['id', 'nombre']);
        return $this->response(200, $results);
    }

}
