<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sampah;
use Illuminate\Http\Request;

class ApiSampahController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'tanggal' => date('Y-m-d H:i:s'),
            'kapasitas' => $request->kapasitas,
            'tinggi_sampah' => $request->tinggi_sampah
        ];

        Sampah::create($data);
        return response()->json($data, 200);
    }
}
