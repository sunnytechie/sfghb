<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reel;
use Illuminate\Http\Request;

class ReelController extends Controller
{
    public function index(Request $request){
        $reels = Reel::orderBy('id', 'desc')->paginate($request->pageSize ?? 20);

        return response()->json([

        ]);
    }
}
