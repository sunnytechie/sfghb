<?php

namespace App\Http\Controllers\Api;

use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index() {
        $info = Info::orderBy('created_at', 'desc')->first();
        $logoUrl = "https://ghb.sfiloveinaction.org/assets/img/ghb.png";
        return response()->json([
            'info' => $info,
            'logoUrl' => $logoUrl,
        ]);
    }
}
