<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInfoController extends Controller
{
    public function user(Request $request, $id) {
        
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


        $user = User::find($id);

        return response()->json([
            'user' => $user,
            'status' => 1
        ]);
    }
}
