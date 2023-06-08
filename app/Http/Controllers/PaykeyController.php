<?php

namespace App\Http\Controllers;

use App\Models\Paykey;
use Illuminate\Http\Request;

class PaykeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paykey = Paykey::orderBy('created_at', 'desc')->first();
        $paystack_test_secret_key = $paykey->paystack_test_secret_key;
        $paystack_test_public_key = $paykey->paystack_test_public_key;
        $paystack_live_secret_key = $paykey->paystack_live_secret_key;
        $paystack_live_public_key = $paykey->paystack_live_public_key;
        $devotion_price = $paykey->devotion_price;
        $devotion_usd_price = $paykey->devotion_usd_price;
        $devotion_usd_price = $paykey->devotion_usd_price;
        $naira_monthly_price = $paykey->naira_monthly_price;
        $usd_monthly_price = $paykey->usd_monthly_price;
        $naira_yearly_price = $paykey->naira_yearly_price;
        $usd_yearly_price = $paykey->usd_yearly_price;
        $id = $paykey->id;
        
        return view('paykeys.index', compact('paystack_test_secret_key', 'naira_monthly_price', 'usd_monthly_price', 'naira_yearly_price', 'usd_yearly_price', 'devotion_usd_price', 'devotion_price', 'id', 'paystack_test_public_key', 'paystack_live_secret_key', 'paystack_live_public_key',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paykey = Paykey::find($id);
        if ($request->has('paystack_test_secret_key')) {
        $paykey->paystack_test_secret_key = $request->paystack_test_secret_key;
        }
            if ($request->has('paystack_test_public_key')) {
                $paykey->paystack_test_public_key = $request->paystack_test_public_key;
                }
                if ($request->has('paystack_live_secret_key')) {
                    $paykey->paystack_live_secret_key = $request->paystack_live_secret_key;
                    }
                    if ($request->has('paystack_live_public_key')) {
                        $paykey->paystack_live_public_key = $request->paystack_live_public_key;
                        }
                        if ($request->has('devotion_price')) {
                            $paykey->devotion_price = $request->devotion_price;
                            }
                            if ($request->has('devotion_usd_price')) {
                                $paykey->devotion_usd_price = $request->devotion_usd_price;
                                }
        $paykey->save();

        return redirect()->back()->with('message', 'This keys has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
