<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history.index');
    }

    public function data(Request $request)
    {
        $query = Sampah::when($request->has('status') && $request->status != "", function ($query) use ($request) {
            $query->where('status', $request->status);
        })
            ->when(
                $request->has('start_date') &&
                    $request->start_date != "" &&
                    $request->has('end_date') &&
                    $request->end_date != "",
                function ($query) use ($request) {
                    $query->whereBetween('created_at', $request->only('start_date', 'end_date'));
                }
            )
            ->orderBy('created_at', 'desc');

        return datatables($query)
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }
}
