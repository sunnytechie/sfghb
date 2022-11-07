<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index() {
        $today = Carbon::now();
        $activeEmailSubscritions = Payment::select('email')
        ->whereDate('validity', '>', $today)
        ->get();

        return response()->json([
            'activeEmailSubscribers' => $activeEmailSubscritions,
        ]);
    }

    public function store(Request $request) {
        //Update validity if email already exits else store details
        $validity = Carbon::today()->addDays(90);
        $checkEmailExist = Payment::select('email')->where('email', $request->email)->first();
       
        if ($checkEmailExist) {
            $payment = Payment::where('email', $request->email)->first();
            $payment->validity = $validity;
            $payment->currency = $request->currency;
            $payment->amount = $request->amount;
            $payment->country = $request->country;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();

        } else {
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
            $payment->validity = $validity;
            $payment->method = $request->method;
            $payment->tx_ref = $request->tx_ref;
            $payment->save();
        }

        return response()->json([
            'status' => "You have successfully paid for searching for Gods heartbeat, thank you."
        ]);
    }
}
