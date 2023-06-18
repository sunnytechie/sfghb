<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paykey;
use Illuminate\Http\Request;

class PaykeyController extends Controller
{
    public function index(Request $request) {
        $header = $request->header('Authorization');
        if (empty($header)) {
           $message = "Invalid request or token.";
           return response()->json([
            'message' => "$message",
            'status' => 0
        ]);
        }

        $header = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        $bearerToken = env('BEARER_TOKEN');

        if ($header !== "Bearer " . $bearerToken) {
            $message = "Invalid request or token.";
           return response()->json([
            'message' => "$message",
            'status' => 0
        ]);
        }

        //Allow access to data via the API end point
        $paykeys = Paykey::orderBy('created_at', 'desc')->first();
        return response()->json([
            'paykeys' => $paykeys,
        ]);
        
    }
}
