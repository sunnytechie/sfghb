<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('created_at', 'desc')
                ->where('published', 1)
                ->get();

        return response()->json([
            'event' => $events,
        ]);
    }

    public function paginateEvent(Request $request) {
        $events = Event::orderBy('created_at', 'desc')
                ->where('published', 1)
                ->paginate($request->pageSize ?? 20);

                //dd($events);

        return response()->json([
            'event' => $events,
        ]);
    }
}
