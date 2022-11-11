<?php

namespace App\Http\Controllers\Api;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
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

            } else {
                $message = "Invalid request";
           return response()->json([
            'status' => "$message"
        ]);
            }
            
        }

        
    }
}
