<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivestreamController extends Controller
{
    public function liveStream() {
        $live = Livestream::orderBy('created_at', 'desc')->first();

        return response()->json([
            'livestream' => $live,
        ]);
    }
}
