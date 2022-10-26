<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AudioSeriesController extends Controller
{
    public function index() {
        $series = Audioserie::orderBy('created_at', 'desc')->with('audio')->get();

        return response()->json([
            'series' => $series,
        ]);
    }
}
