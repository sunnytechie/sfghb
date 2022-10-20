<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
    public function googleLogin(Request $request) {

        $input = $request->all();

        $findUser = User::where('email', $input['email'])->first();
      
           if($findUser){
            $findUserId = $findUser->id;
               $user = User::where('id', $findUserId)->first();
               return response()->json([
                'success' => 'Successfully logged in',
                 'user' => $user], 
                 200);
           }else{
               $newUser = User::create([
                   'name' => $input['name'],
                   'email' => $input['email'],
                   'google_id'=> $input['google_id'],
                   'password' => Hash::make('@12340987'),
                   'login_type' => "Google",
                   'email_verified_at' => now(),
               ]);
               
               $findUserId = $newUser->id;
               //dd($findUserId);
               $user = User::where('id', $findUserId)->first();
               return response()->json([
                'success' => 'SignUp Successful', 
                'user' => $user], 
                200);
           }
    }
}
