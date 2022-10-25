<?php

namespace App\Http\Controllers\Api;

use App\Models\Newspaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index() {
        $news = Newspaper::orderBy('created_at', 'desc')
                ->where('published', 1)
                ->get();

        return response()->json([
            'news' => $news,
        ]);
    }
}
