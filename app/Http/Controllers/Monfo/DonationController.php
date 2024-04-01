<?php

namespace App\Http\Controllers\Monfo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function index()
    {
        $donations = DB::table('monfo_donations')->get();
        return view('monfo.donation', compact('donations'));
    }
}
