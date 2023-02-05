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
            $today = Carbon::now();
            $thisWeekdevotions = Devotion::orderBy('read_date', 'desc')
                ->whereDate('read_date', '>=', $today->startOfWeek())
                ->whereDate('read_date', '<=', $today->endOfWeek())
                ->where('published', 1)
                ->get();

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
