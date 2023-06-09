<?php

namespace App\Http\Controllers\Api;

use App\Models\Audioserie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AudioSeriesController extends Controller
{
    public function index(Request $request) {
        $series = Audioserie::orderBy('created_at', 'desc')->with('audio')
                ->paginate($request->pageSize ?? 20);

        return response()->json([
            'series' => $series,
        ]);
    }
}
