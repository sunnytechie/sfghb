<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleLoginController extends Controller
{
    public function googleLogin(Request $request) {

        $input = $request->all();

        $findUser = User::where('email', $input['email'])->first();
      
           if($findUser){
      
               Auth::login($findUser);
     
               return response()->json(['success' => 'Successfully logged in', 'user' => Auth::login($findUser)], 200);
      
           }else{
               $newUser = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                   'google_id'=> $user->id,
                   'password' => Hash::make('@12340987'),
                   'login_type' => "Google",
               ]);
     
               Auth::login($newUser);
     
               return response()->json(['success' => 'Successfully logged in', 'user' => Auth::login($newUser)], 200);
           }
    }
}
