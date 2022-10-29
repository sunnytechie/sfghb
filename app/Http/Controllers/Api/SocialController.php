<?php

namespace App\Http\Controllers\Api;

use App\Models\Socail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function social() {
        $social = Socail::orderBy('created_at', 'desc')->first();

        return response()->json([
            'social' => $social,
        ]);
    }
}
