<?php

namespace App\Http\Controllers\Monfo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TrainingRegController extends Controller
{
    public function index()
    {
        $trainees = DB::table('monfo_trainings')->get();
        return view('monfo.trainees', compact('trainees'));
    }
}
