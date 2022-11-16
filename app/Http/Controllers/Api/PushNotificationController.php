<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PushNotification;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    public function index() {
        $notifications = PushNotification::orderBy('created_at', 'desc')->take(12)->get();

        return response()->json([
            'notifications' => $notifications,
        ]);
    }
}
