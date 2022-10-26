<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index() {
        $audio = Audio::orderBy('created_at', 'desc')->get();

        return response()->json([
            'audio' => $audio,
        ]);
    }
}
