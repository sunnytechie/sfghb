<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

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
                   'password' => Hash::make('@12340987#'),
                   'login_type' => "Google",
                   'email_verified_at' => now(),
               ]);

               //free trial for 7 days on payment
                $validity = Carbon::today()->addDays(7);
                $payment = new Payment;
                $payment->name = $newUser->name;
                $payment->email = $newUser->email;
                $payment->currency = "NGN";
                $payment->country = "NG";
                $payment->amount = 0;
                $payment->validity = $validity;
                $payment->method = "Free Trial";
                $payment->tx_ref = "Free Trial";
                $payment->save();
               
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
