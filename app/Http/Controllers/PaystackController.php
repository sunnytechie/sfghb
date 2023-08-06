<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaystackController extends Controller
{
    public function subscribeCompleted(){
        return view('completed');
    }

    public function intiateBasic($id){
        $user = User::find($id);
        if ($user == null) {
            return "user not found";
        }
        $reference = Paystack::genTranxRef();
        $email = $user->email;
        $amount = 500;

        $data = array(
            "amount" => $amount * 100,
            "reference" => $reference,
            "email" => $email,
            "currency" => "NGN",
            "callback_url" => "https://www.sfghb.org/subscribe/basic/callback/$user->id",
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function intiatePremium($id) {
        $user = User::find($id);
        if ($user == null) {
            return "user not found";
        }
        $reference = Paystack::genTranxRef();
        $email = $user->email;
        $amount = 1000;

        $data = array(
            "amount" => $amount * 100,
            "reference" => $reference,
            "email" => $email,
            "currency" => "NGN",
            "callback_url" => "https://www.sfghb.org/subscribe/premium/callback/$user->id",
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function intiateSilver($id) {
        $user = User::find($id);
        if ($user == null) {
            return "user not found";
        }
        $reference = Paystack::genTranxRef();
        $email = $user->email;
        $amount = 1500;

        $data = array(
            "amount" => $amount * 100,
            "reference" => $reference,
            "email" => $email,
            "currency" => "NGN",
            "callback_url" => "https://www.sfghb.org/subscribe/silver/callback/$user->id",
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function intiateGold($id) {
        $user = User::find($id);
        if ($user == null) {
            return "user not found";
        }
        $reference = Paystack::genTranxRef();
        $email = $user->email;
        $amount = 2000;

        $data = array(
            "amount" => $amount * 100,
            "reference" => $reference,
            "email" => $email,
            "currency" => "NGN",
            "callback_url" => "https://www.sfghb.org/subscribe/gold/callback/$user->id",
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

}
