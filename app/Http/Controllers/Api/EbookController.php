<?php

namespace App\Http\Controllers\Api;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class EbookController extends Controller
{
    public function index(Request $request){
        $ebooks = Ebook::orderBy('id', 'desc')->paginate($request->pageSize ?? 20);
        
        //new series
        $startDate = Carbon::now()->subDays(360);
        $newSeries = Ebook::orderBy('id', 'desc')
                ->where('created_at', '>=', $startDate)
                ->paginate($request->pageSize ?? 20);

        //recommended
        $recommended = Ebook::orderBy('id', 'desc')
                ->where('recommended', 1)
                ->paginate($request->pageSize ?? 20);

        //popular
        $popular = Ebook::orderBy('id', 'desc')
                ->where('popular', 1)
                ->paginate($request->pageSize ?? 20);

        return response()->json([
            'ebooks' => $ebooks,
            'newSeries' => $newSeries,
            'popular' => $popular,
            'recommended' => $recommended,
            'status' => 1,
            'message' => "success"
        ]);
    }
}
