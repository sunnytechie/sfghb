<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountDeleteController extends Controller
{
    public function deleteAccount(Request $request, $user_id) {
        //find user
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        //check if password matches
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password does not match'
            ], 401);
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'Account deleted successfully.'
        ]);
    }
}
