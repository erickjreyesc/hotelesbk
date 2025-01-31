<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait JsonTrait
{
    public function response($code, $data, $id = null)
    {
        return response()->json([
            'code' => $code,
            'element_id' => $id,
            'data' => $data
        ]);
    }

    public function error($code, $message, $th = null)
    {
        Log::info('Excepcion: ' . $th->getCode() . ', ' . $th->getMessage());

        return response()->json([
            'errors' => $message
        ], $code);
    }
}
