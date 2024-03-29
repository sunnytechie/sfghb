<?php

namespace App\Http\Controllers\Api;

use App\Models\Health;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    public function index() {
        $health = Health::orderBy('created_at', 'desc')
                ->get();

        return response()->json([
            'health' => $health,
        ]);
    }

    public function paginateHealth(Request $request) {
        $health = Health::orderBy('created_at', 'desc')
        ->paginate($request->pageSize ?? 20);

        return response()->json([
            'health' => $health,
        ]);
    }
}
