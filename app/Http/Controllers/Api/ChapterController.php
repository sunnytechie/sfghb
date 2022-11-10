<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index() {
        $chapters = Chapter::orderBy('created_at', 'desc')->get();

        return response()->json([
            'chapters' => $chapters,
        ]);
    }
}
