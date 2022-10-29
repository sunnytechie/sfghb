<?php

namespace App\Http\Controllers\Api;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function store(Request $request) {

        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'currency' => 'required',
            'amount' => 'required',
            'country' => '',
            'method' => 'required',
            'tx_ref' => 'required',
            'reason' => '',
        ]);

        $payment = new Donation;
        $payment->name = $request->name;
        $payment->email = $request->email;
        $payment->currency = $request->currency;
        $payment->amount = $request->amount;
        $payment->country = $request->country;
        $payment->method = $request->method;
        $payment->tx_ref = $request->tx_ref;
        $payment->reason = $request->reason;
        $payment->save();

        $status = "Beloved, your donations are made successfully into the ministry of Sisters' Fellowship International. Thank you.";

        return response()->json([
            'status' => $status,
        ]);
    }
}
