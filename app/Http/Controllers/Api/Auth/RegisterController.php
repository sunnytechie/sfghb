<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //register user api
    public function register(Request $request)
    {
        //$input = $request->all();
        $input = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        //send email verify at 
        $user->sendEmailVerificationNotification();

        //free trial for 7 days on payment
        $validity = Carbon::today()->addDays(7);
        $payment = new Payment;
        $payment->name = $user->name;
        $payment->email = $user->email;
        $payment->currency = "NGN";
        $payment->amount = 0;
        $payment->country = "NG";
        $payment->validity = $validity;
        $payment->method = "Free Trial";
        $payment->tx_ref = "Free Trial";
        $payment->save();
        
        //success message for user to verify their email
        $success = "Thanks for signing up! Before getting started, verify your email address by clicking on the link we just sent to your email.";

        return response()->json(['success' => $success], 200);
    }
}
