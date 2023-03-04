<?php

namespace App\Http\Controllers\Api;

use App\Models\Devotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DevotionController extends Controller
{
    public function index() {
        $devotions = Devotion::orderBy('read_date', 'desc')
                ->where('published', 1)
                ->get();

        return response()->json([
            'devotion' => $devotions,
        ]);
    }

    public function thisWeek() {
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY);
        
        $thisWeekdevotions = Devotion::where('read_date', '>=', $startOfWeek)
                            ->where('read_date', '<=', $endOfWeek)
                            ->where('published', 1)
                            ->get();

        //$thisWeekdevotions = Devotion::orderBy('read_date', 'desc')
            //->whereDate('read_date', '==', $today->startOfWeek())
            //->whereDate('read_date', '<=', $today->endOfWeek())
            //->where('published', 1)
            //->get();

        return response()->json([
            'devotion' => $thisWeekdevotions,
        ]);
    }

    public function show() {
        $today = Carbon::now();
        $devotion = Devotion::whereDate('read_date', $today)->first();

        return response()->json([
            'devotionToday' => $devotion,
        ]);
    }
}
