<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebVersionController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
}
