<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class CallbackController extends Controller
{
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            //dd($e);
            return Redirect::back()->withMessage(['message'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    //One Month
    public function callbackSubscribeBasic($id) {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);

        //Get required details
        $amount = $paymentDetails['data']['amount'];
        $status = $paymentDetails['data']['status'];
        $reference = $paymentDetails['data']['reference'];
        $email = $paymentDetails['data']['customer']['email']; //Email of Auth user
        $order_id = $paymentDetails['data']['order_id'];
        $currency = $paymentDetails['data']['currency'];

        if ($status != "success") {
            return  "This transaction is cancelled contact admin.";
        }
        $amount = $amount / 100;
        $user = User::find($id);
        // Create a Carbon instance for your initial date
        $initialDate = Carbon::parse('2023-08-06');
        // Add a month to the initial date
        $newDate = $initialDate->addMonth();

        //update subscription
        $payment = Payment::where('email', $email)->first();
        //dd($payment);
        if ($payment == null) {
            $payment = new Payment();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        } else {
            $payment = Payment::where('email', $email)->first();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        }

        //Return user to mobile.
        return redirect()->route('subscribeCompleted');
    }

    //Three Month
    public function callbackSubscribePremium($id) {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);

        //Get required details
        $amount = $paymentDetails['data']['amount'];
        $status = $paymentDetails['data']['status'];
        $reference = $paymentDetails['data']['reference'];
        $email = $paymentDetails['data']['customer']['email']; //Email of Auth user
        $order_id = $paymentDetails['data']['order_id'];
        $currency = $paymentDetails['data']['currency'];

        if ($status != "success") {
            return  "This transaction is cancelled contact admin.";
        }

        $amount = $amount / 100;
        $user = User::find($id);
        // Create a Carbon instance for your initial date
        $initialDate = Carbon::parse('2023-08-06');
        // Add 3 month to the initial date
        $newDate = $initialDate->addMonth(3);

        //update subscription
        $payment = Payment::where('email', $email)->first();
        if ($payment == null) {
            $payment = new Payment();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        } else {
            $payment = Payment::where('email', $email)->first();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        }

        //Return user to mobile.
        return redirect()->route('subscribeCompleted');
    }

    //Six Month
    public function callbackSubscribeSilver($id) {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);

        //Get required details
        $amount = $paymentDetails['data']['amount'];
        $status = $paymentDetails['data']['status'];
        $reference = $paymentDetails['data']['reference'];
        $email = $paymentDetails['data']['customer']['email']; //Email of Auth user
        $order_id = $paymentDetails['data']['order_id'];
        $currency = $paymentDetails['data']['currency'];

        if ($status != "success") {
            return  "This transaction is cancelled contact admin.";
        }

        $amount = $amount / 100;
        $user = User::find($id);
        // Create a Carbon instance for your initial date
        $initialDate = Carbon::parse('2023-08-06');
        // Add 6 month to the initial date
        $newDate = $initialDate->addMonth(6);

        //update subscription
        $payment = Payment::where('email', $email)->first();
        if ($payment == null) {
            $payment = new Payment();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        } else {
            $payment = Payment::where('email', $email)->first();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        }

        //Return user to mobile.
        return redirect()->route('subscribeCompleted');
    }

    //One Year
    public function callbackSubscribeGold($id) {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);

        //Get required details
        $amount = $paymentDetails['data']['amount'];
        $status = $paymentDetails['data']['status'];
        $reference = $paymentDetails['data']['reference'];
        $email = $paymentDetails['data']['customer']['email']; //Email of Auth user
        $order_id = $paymentDetails['data']['order_id'];
        $currency = $paymentDetails['data']['currency'];

        if ($status != "success") {
            return  "This transaction is cancelled contact admin.";
        }

        $amount = $amount / 100;
        $user = User::find($id);
        // Create a Carbon instance for your initial date
        $initialDate = Carbon::parse('2023-08-06');
        // Add 12 month to the initial date
        $newDate = $initialDate->addMonth(12);

        //update subscription
        $payment = Payment::where('email', $email)->first();
        if ($payment == null) {
            $payment = new Payment();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        } else {
            $payment = Payment::where('email', $email)->first();
            $payment->name = $user->name;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->validity = $newDate;
            $payment->method = "Card";
            $payment->tx_ref = $reference;
            $payment->save();
        }

        //Return user to mobile.
        return redirect()->route('subscribeCompleted');
    }

}
