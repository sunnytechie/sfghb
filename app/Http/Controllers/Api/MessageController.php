<?php

namespace App\Http\Controllers\Api;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function storeMessage(Request $request) {
        request()->validate([
            'title' => '',
            'body' => 'required',
        ]);

        $feedback = new Feedback;
        $feedback->title = $request->title;
        $feedback->body = $request->body;
        $feedback->save();

        $status = "Your feedback is successfully sent to us. Thank you.";

        return response()->json([
            'status' => $status,
        ]);
    }
}
