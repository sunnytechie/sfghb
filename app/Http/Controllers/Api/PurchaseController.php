<?php

namespace App\Http\Controllers\Api;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PurchaseController extends Controller
{
    public function store(Request $request) {

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
    }
}
