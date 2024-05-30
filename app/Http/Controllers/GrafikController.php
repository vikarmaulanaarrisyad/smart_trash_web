<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function getData()
    {
        $data = Sampah::orderBy('created_at', 'desc')->take(5)->get();

        return response()->json($data);
    }
}
