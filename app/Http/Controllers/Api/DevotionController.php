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

    public function thisWeek(Request $request) {
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY);
        
        $thisWeekdevotions = Devotion::where('read_date', '>=', $startOfWeek)
                            ->where('read_date', '<=', $endOfWeek)
                            ->where('published', 1)
                            ->paginate($request->pageSize ?? 7);

        //$thisWeekdevotions = Devotion::orderBy('read_date', 'desc')
            //->whereDate('read_date', '==', $today->startOfWeek())
            //->whereDate('read_date', '<=', $today->endOfWeek())
            //->where('published', 1)
            //->get();

        return response()->json([
            'devotion' => $thisWeekdevotions,
        ]);
    }

    public function monthly(Request $request) {
        //$devotions = Devotion::orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->get();

        //In 2023
        $year2023 = 2023;
        $january = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 1)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 31);
        $february = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 2)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 29);
        $march = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 3)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 31);
        $april = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 4)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 30);
        $may = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 5)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 31);
        $june = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 6)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 30);
        $july = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 7)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 31);
        $august = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 8)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 31);
        $september = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 9)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 30);
        $october = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 10)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 31);
        $november = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 11)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 30);
        $december = Devotion::whereYear('read_date', $year2023)->whereMonth('read_date', 12)->orderByRaw("YEAR(read_date) ASC, MONTH(read_date) ASC")->paginate($request->pageSize ?? 31);
        
        return response()->json([
            'january' => $january,
            'february' => $february,
            'march' => $march,
            'april' => $april,
            'may' => $may,
            'june' => $june,
            'july' => $july,
            'august' => $august,
            'september' => $september,
            'october' => $october,
            'november' => $november,
            'december' => $december,
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
