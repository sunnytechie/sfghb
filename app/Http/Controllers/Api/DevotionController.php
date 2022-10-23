<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevotionController extends Controller
{
    public function index() {
        $devotions = Devotion::orderBy('created_at', 'desc')->get();

        return response()->json([
            'devotions' => $devotions,
        ]);
    }
}
