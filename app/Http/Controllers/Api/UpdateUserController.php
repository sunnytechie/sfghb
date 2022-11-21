<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateUserController extends Controller
{
    public function update(Request $request, $id) {

        //dd($request->all());
        $header = $request->header('Authorization');
        if (empty($header)) {
           $message = "Invalid request or token.";
           return response()->json([
            'status' => "$message"
        ]);
        } else {
            if ($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5ODc2NTQzMjM0NTY3OTg3NjU0IiwibmFtZSI6IlNpc3RlcnMnIEZlbGxvd3NoaXAgSW50J2wiLCJpYXQiOjE1MTYyMzkwMjJ9.GziMCTMS3cwqX9RfATjEgX9ZpjBVxW8ASI2G8kGR5hY") {
                //Allow access to data via the API end point

                //dd($request->all());

                $request->validate([
                    'name' => 'required',
                    'country' => 'required',
                    'gender' => 'required',
                    'state' => 'required',
                    'phone' => 'required',
                ]);

                

                $user = User::find($id);
                $user->name = $request->name;
                $user->country = $request->country;
                $user->gender = $request->gender;
                $user->state = $request->state;
                $user->phone = $request->phone;
                $user->save();

                $status = "Your profile has been updated successfully, thank you.";
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
