<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OtpEmail;
use Illuminate\Support\Facades\Mail;

class OtpVerifyController extends Controller
{
    //api to verify otp
    public function verify(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'email' => 'required|string',
            'token' => 'required|string',
        ]);

        //check if the email has this token
        $otp = Otp::where('email', $request->email)->where('token', $request->token)->first();
        
        //if the email has this token
        if ($otp) {
            //update the user email_verified_at
            $user = User::where('email', $request->email)->first();
            $user->email_verified_at = now();
            $user->save();
            //delete the token
            $otp->delete();
            return response()->json([
                'message' => 'Email verified successfully',
                'status' => 1
            ], 200);
        }

        else {
            return response()->json([
                'message' => 'Invalid token',
                'status' => 0
            ], 200);
        }
    }

    //api to get/resend/send verification otp
    public function sendVerificationTokenToEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        //dd($request->email);

        $user = User::where('email', $request->email)->first();

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email already verified',
                'status' => 1
            ], 400);
        }
        //generate 4 digit token
        $email = $user->email;
        $pin = mt_rand(1000, 9999);
        $subject = "Your buildbeta Verification Code.";
        Mail::to($request->email)->send(new OtpEmail($subject, $pin));

        //Save the pin to the database
        Otp::create([
            'token' => $pin,
            'email' => $email,
        ]);

        return response()->json([
            'message' => 'Verification code sent to your email',
            'status' => 1
        ]);
    }
}
