<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index(Request $request) {
        $feeds = Youtube::orderBy('id', 'desc')->paginate($request->pageSize ?? 20);

        return response()->json([
            'feeds' => $feeds,
        ]);
    }
}
