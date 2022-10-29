<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function store(Request $request) {

        $validity = Carbon::today()->addDays(90);
        //print_r($date);

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

        $status = Payment::where('email', $payment->email)->first();
        return response()->json([
            'status' => $status,
        ]);
    }
}
