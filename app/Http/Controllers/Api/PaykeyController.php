<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paykey;
use Illuminate\Http\Request;

class PaykeyController extends Controller
{
    public function index(Request $request) {
        $header = $request->header('Authorization');
        if (empty($header)) {
           $message = "Invalid request or token.";
           return response()->json([
            'status' => "$message"
        ]);
        } else {
            if ($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5ODc2NTQzMjM0NTY3OTg3NjU0IiwibmFtZSI6IlNpc3RlcnMnIEZlbGxvd3NoaXAgSW50J2wiLCJpYXQiOjE1MTYyMzkwMjJ9.GziMCTMS3cwqX9RfATjEgX9ZpjBVxW8ASI2G8kGR5hY") {
                //Allow access to data via the API end point
                $paykeys = Paykey::orderBy('created_at', 'desc')->first();
                return response()->json([
                    'paykeys' => $paykeys,
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
