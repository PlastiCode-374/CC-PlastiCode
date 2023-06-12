<?php

namespace App\Http\Controllers\API;

use App\Models\Plastic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlasticController extends Controller
{
    public function show($jenis_plastik)
    {
        $data = Plastic::query()
            ->where('jenis_plastik', $jenis_plastik)
            ->first();

        if (!$data) {
            return response()->json([
                'status_code' => 404,
                'success' => false,
                'error' => true,
                'error_message' => 'Data not found'
            ]);
        }

        return response()->json([
            'status_code' => 201,
            'success' => true,
            'error' => false,
            'success_message' => 'Data found.',
            'data' => $data
        ]);
    }
}