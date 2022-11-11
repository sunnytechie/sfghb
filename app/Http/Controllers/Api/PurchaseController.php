<?php

namespace App\Http\Controllers\Api;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PurchaseController extends Controller
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
                    'phone' => 'required',
                    'no_copy' => '',
                    'for_who' => '',
                    'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'currency' => '',
                    'amount' => 'required',
                    'method' => 'required',
                    'tx_ref' => 'required',
                ]);
        
                if ($request->has('thumbnail')) {
                    $imagePath = request('thumbnail')->store('purchase', 'public');
                    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
                    $image->save();
                }
        
                $purchase = new Purchase;
                $purchase->name = $request->name;
                $purchase->email = $request->email;
                $purchase->phone = $request->phone;
                $purchase->no_copy = $request->no_copy;
                $purchase->for_who = $request->for_who;
                if ($request->has('thumbnail')) {
                $purchase->thumbnail = $imagePath;
                }
                $purchase->currency = $request->currency;
                $purchase->amount = $request->amount;
                $purchase->method = $request->method;
                $purchase->tx_ref = $request->tx_ref;
                $purchase->save();
        
                $status = "Your purchase is completed successfully, kindly check your email inbox, thank you.";
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
