<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(Request $request) {
        $events = Event::orderBy('created_at', 'desc')
                ->where('published', 1)
                ->paginate($request->pageSize ?? 20);

        return response()->json([
            'event' => $events,
        ]);
    }
}
