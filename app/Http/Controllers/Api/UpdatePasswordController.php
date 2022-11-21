<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function update(Request $request, $id) {

        $header = $request->header('Authorization');
        if (empty($header)) {
           $message = "Invalid request or token.";
           return response()->json([
            'status' => "$message"
        ]);
        } else {
            if ($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5ODc2NTQzMjM0NTY3OTg3NjU0IiwibmFtZSI6IlNpc3RlcnMnIEZlbGxvd3NoaXAgSW50J2wiLCJpYXQiOjE1MTYyMzkwMjJ9.GziMCTMS3cwqX9RfATjEgX9ZpjBVxW8ASI2G8kGR5hY") {
                //Allow access to data via the API end point
                $request->validate([
                    'previous_password' => '',
                    'new_password' => 'min:6',
                ]);
               
                //get previous password as hash and typed password as hash
                $user = User::find($id);
                //$db_prev_password = $user->password;
                //$previous_password = Hash::make($request->previous_password);
                //dd($previous_password);

                //check if previous password = $request->password
                if (Hash::check($request->previous_password, $user->password)) {
                    $user = User::find($id);
                    $user->password = Hash::make($request->new_password);
                    $user->save();
            
                    $status = "Your password has been updated successfully, thank you.";
                    return response()->json([
                        'status' => $status,
                    ]);
                } else {
                    $status = "Your previous password is incorrect.";
                    return response()->json([
                        'status' => $status,
                    ]);
                }

            } else {
                $message = "Invalid request";
           return response()->json([
            'status' => "$message"
        ]);
            }
            
        }



    
    
    
}
}
