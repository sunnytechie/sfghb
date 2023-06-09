<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index(Request $request) {
        $faqs = Faq::orderBy('created_at', 'desc')
        ->paginate($request->pageSize ?? 20);

        return response()->json([
            'faq' => $faqs,
        ]);
    }
}
