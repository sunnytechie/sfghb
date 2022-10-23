<?php

namespace App\Http\Controllers\Api;

use App\Models\Devotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevotionController extends Controller
{
    public function index() {
        $devotions = Devotion::orderBy('created_at', 'desc')
                ->where('published', 1)
                ->get();

        return response()->json([
            'devotion' => $devotions,
        ]);
    }
}
