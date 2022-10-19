<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //$success = "Successfully logged in";
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => '',
        ]);

            if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {

                //if user email is not verified
                if (auth()->user()->email_verified_at == null) {
                    return response()->json(['verify_account' => 'Kindly check your email inbox to verify your account.'], 401);
                }
                
                if(auth()->user()->is_admin == 1) {
                    //success response with all user details
                    return response()->json(['success' => 'Successfully logged in', 'user' => auth()->user()], 200);
                    //return response()->json(['success' => 'Successfully logged in', 'name' => auth()->user()->name, 'email' => auth()->user()->email], 200);
                   }
                //if user email is verified
                if(auth()->user()->email_verified_at != null) {
                    //success response with user name and email
                    return response()->json(['success' => 'Successfully logged in', 'user' => auth()->user()], 200);
                }
                
            }
            
            else {
                return response()->json(['error' => 'Invalid email or password'], 401);
            } 
               
    }
}
