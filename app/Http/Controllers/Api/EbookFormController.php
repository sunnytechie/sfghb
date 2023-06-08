<?php

namespace App\Http\Controllers\Api;

use App\Mail\EbookEmail;
use App\Models\Ebookform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EbookFormController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'book_name' => 'required',
            'book_type' => 'required',
        ]);

        $requestForm = new Ebookform();
        $requestForm->name = $request->name;
        $requestForm->email = $request->email;
        $requestForm->phone = $request->phone;
        $requestForm->book_name = $request->book_name;
        $requestForm->book_type = $request->book_type;
        $requestForm->save();

        //Send email
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        $compose = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ];

         //send email
         $emailToSendMsgTo = "Genesisgeneration3@hotmail.co.uk";
         Mail::to($emailToSendMsgTo)->send(new EbookEmail($name, $email, $phone));

        return response()->json([
            'status' => 1,
            'message' => "You have successfully requested for this ebook, we will contact you soon",
        ]);
    }
}
