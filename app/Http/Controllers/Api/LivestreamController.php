<?php

namespace App\Http\Controllers\Api;

use App\Models\Livestream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivestreamController extends Controller
{
    public function liveStream() {
        $live = Livestream::orderBy('created_at', 'desc')->first();

        return response()->json([
            'livestream' => $live,
        ]);
    }
}
