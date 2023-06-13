<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'model_name' => 'required',
            'ip_address' => '',
        ]);

        $view = new View();
        $view->model_name = $request->model_name;
        $view->ip_address = $request->ip_address;
        $view->save();

        return response()->json([
            'status' => 1,
            'message' => "success",
        ]);
    }
}
