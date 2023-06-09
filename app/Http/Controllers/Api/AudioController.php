<?php

namespace App\Http\Controllers\Api;

use App\Models\Audio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AudioController extends Controller
{
    public function index() {
        $audio = Audio::orderBy('created_at', 'desc')->get();

        return response()->json([
            'audio' => $audio,
        ]);
    }

    public function paginateAudio(Request $request) {
        $audio = Audio::orderBy('created_at', 'desc')
        ->paginate($request->pageSize ?? 20);

        return response()->json([
            'audio' => $audio,
        ]);
    }
}
