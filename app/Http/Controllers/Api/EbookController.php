<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index(Request $request){
        $ebooks = Ebook::orderBy('id', 'desc')->paginate($request->pageSize ?? 20);

        return response()->json([
            'ebooks' => $ebooks,
            'status' => 1
        ]);
    }
}
