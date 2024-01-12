<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::select('title', 'description', 'image')->first();
        return response()
        ->json([
            'status' => true,
            'banners' => $banners
        ]);
    }
}
