<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Paykey;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index(Request $request) {
        $today = Carbon::now();
        $activeEmailSubscritions = Payment::select('email')
        ->whereDate('validity', '>', $today)
        ->get();

        $header = $request->header('Authorization');
        if (empty($header)) {
           $message = "Invalid request or token.";
           return response()->json([
            'status' => "$message"
        ]);
        } else {
            if ($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5ODc2NTQzMjM0NTY3OTg3NjU0IiwibmFtZSI6IlNpc3RlcnMnIEZlbGxvd3NoaXAgSW50J2wiLCJpYXQiOjE1MTYyMzkwMjJ9.GziMCTMS3cwqX9RfATjEgX9ZpjBVxW8ASI2G8kGR5hY") {
                //Allow access to data via the API end point
                return response()->json([
                    'activeEmailSubscribers' => $activeEmailSubscritions,
                ]);
            } else {
                $message = "Invalid request or token";
           return response()->json([
            'status' => "$message"
        ]);
            }

        }


    }

    public function store(Request $request) {


        $header = $request->header('Authorization');
        if (empty($header)) {
           $message = "Invalid request or token.";
           return response()->json([
            'status' => "$message"
        ]);
        } else {
            if ($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5ODc2NTQzMjM0NTY3OTg3NjU0IiwibmFtZSI6IlNpc3RlcnMnIEZlbGxvd3NoaXAgSW50J2wiLCJpYXQiOjE1MTYyMzkwMjJ9.GziMCTMS3cwqX9RfATjEgX9ZpjBVxW8ASI2G8kGR5hY") {
                //Allow access to data via the API end point
        $checkEmailExist = Payment::select('email')->where('email', $request->email)->first();
        if ($checkEmailExist) {
            $payment = Payment::where('email', $request->email)->first();
            $payment->validity = Carbon::today()->addDays(90);
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

        }
        else {
            request()->validate([
                'name' => 'required',
                'email' => 'required',
                'currency' => 'required',
                'amount' => 'required',
                'country' => '',
                'method' => 'required',
                'tx_ref' => 'required',
            ]);

            $payment = new Payment;
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->validity = Carbon::today()->addDays(90);;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();
        }

        return response()->json([
            'status' => "You have successfully paid for searching for Gods heartbeat, thank you."
        ]);

        } else {
                $message = "Invalid request or token";
           return response()->json([
            'status' => "$message"
        ]);
            }

        }



    }

    //Storing data
    public function bearer(Request $request) {
        $header = $request->header('Authorization');
        if (empty($header)) {
           $message = "Invalid request or token.";
           return response()->json([
            'status' => "$message"
        ]);
        } else {
            if ($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5ODc2NTQzMjM0NTY3OTg3NjU0IiwibmFtZSI6IlNpc3RlcnMnIEZlbGxvd3NoaXAgSW50J2wiLCJpYXQiOjE1MTYyMzkwMjJ9.GziMCTMS3cwqX9RfATjEgX9ZpjBVxW8ASI2G8kGR5hY") {
                //Allow access to data via the API end point
            } else {
                $message = "Invalid request";
           return response()->json([
            'status' => "$message"
        ]);
            }

        }

    }


    public function payMonthly(Request $request, $user_id) {
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

        $checkEmailExist = Payment::select('email')->where('email', $request->email)->first();
        if ($checkEmailExist) {
            $payment = Payment::where('email', $request->email)->first();
            $payment->validity = Carbon::today()->addDays(30);
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->badge = "Basic";
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }
        else {
            request()->validate([
                'name' => 'required',
                'email' => 'required',
                'currency' => 'required',
                'amount' => 'required',
                'country' => '',
                'method' => 'required',
                'tx_ref' => 'required',
            ]);

            $payment = new Payment;
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->validity = Carbon::today()->addDays(30);;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->badge = "Basic";
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }


    }

    public function payQuarterly(Request $request, $user_id) {
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

        $checkEmailExist = Payment::select('email')->where('email', $request->email)->first();
        if ($checkEmailExist) {
            $payment = Payment::where('email', $request->email)->first();
            $payment->validity = Carbon::today()->addDays(90);
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->badge = "Premium";
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }
        else {
            request()->validate([
                'name' => 'required',
                'email' => 'required',
                'currency' => 'required',
                'amount' => 'required',
                'country' => '',
                'method' => 'required',
                'tx_ref' => 'required',
            ]);

            $payment = new Payment;
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->validity = Carbon::today()->addDays(90);;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }


    }

    public function payBianually(Request $request, $user_id) {
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

        $checkEmailExist = Payment::select('email')->where('email', $request->email)->first();
        if ($checkEmailExist) {
            $payment = Payment::where('email', $request->email)->first();
            //add 6 months to the validity
            $payment->validity = Carbon::today()->addDays(182);
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->badge = "Silver";
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }
        else {
            request()->validate([
                'name' => 'required',
                'email' => 'required',
                'currency' => 'required',
                'amount' => 'required',
                'country' => '',
                'method' => 'required',
                'tx_ref' => 'required',
            ]);

            $payment = new Payment;
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->validity = Carbon::today()->addDays(182);;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->badge = "Silver";
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }


    }

    public function payYearly(Request $request, $user_id) {
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

        $checkEmailExist = Payment::select('email')->where('email', $request->email)->first();
        if ($checkEmailExist) {
            $payment = Payment::where('email', $request->email)->first();
            $payment->validity = Carbon::today()->addDays(365);
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->badge = "Gold";
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }
        else {
            request()->validate([
                'name' => 'required',
                'email' => 'required',
                'currency' => 'required',
                'amount' => 'required',
                'country' => '',
                'method' => 'required',
                'tx_ref' => 'required',
            ]);

            $payment = new Payment;
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->validity = Carbon::today()->addDays(365);;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

            //Update user subscribe logic
            //Update user subscribe logic
            $user = User::find($user_id);
            $user->subscribe = 1;
            $user->badge = "Gold";
            $user->save();

            return response()->json([
                'message' => "Successful",
                'status' => 1,
            ]);

        }



    }

    public function priceInfo(Request $request) {
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

        $paykeys = Paykey::orderBy('created_at', 'desc')->first();

                return response()->json([
                    'paykeys' => $paykeys,
                    'status' => 1,
                ]);
    }

    public function price() {
        $basic = 500;
        $premium = 1000;
        $silver = 1500;
        $gold = 2000;

        return response()->json([
            'basic' => $basic,
            'premium' => $premium,
            'silver' => $silver,
            'gold' => $gold,
        ]);
    }

    public function applePlan() {
        //make a loop of data/array with title, price
        $applePlan = [
            [
                'title' => 'Basic',
                'price' => 500,
            ],
            [
                'title' => 'Premium',
                'price' => 1000,
            ],
            [
                'title' => 'Silver',
                'price' => 1500,
            ],
            [
                'title' => 'Gold',
                'price' => 2000,
            ],
        ];

        return response()->json([
            'applePlan' => $applePlan,
        ]);
    }

    public function subscriptionValidity(Request $request) {

        $payment = Payment::where('email', $request->email)->first();

        if ($payment == null) {
            return response()->json([
                'message' => "Please subscribe to a plan.",
                'status' => 0,
            ]);
        }

        if ($payment->validity <= Carbon::now()) {
            return response()->json([
                'message' => "Please subscribe to a plan.",
                'status' => 0,
            ]);
        }

        return response()->json([
            'message' => "Subscription is still valid.",
            'status' => 1,
        ]);

    }
}
