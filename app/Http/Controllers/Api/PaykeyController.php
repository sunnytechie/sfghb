<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paykey;
use Illuminate\Http\Request;

class PaykeyController extends Controller
{
    public function index() {
        $paykeys = Paykey::orderBy('created_at', 'desc')->first();
        return response()->json([
            'paykeys' => $paykeys,
        ]);
    }
}
