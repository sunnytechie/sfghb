<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use App\Models\Audio;
use App\Models\Event;
use App\Models\Health;
use App\Models\Payment;
use App\Models\Devotion;
use App\Models\Donation;
use App\Models\Feedback;
use App\Models\Purchase;
use App\Models\Newspaper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all());
        $users = User::orderBy('created_at', 'desc')->get();
        $admins = User::where('is_admin', 1)->get();
        $devotions = Devotion::orderBy('created_at', 'desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        $news = Newspaper::orderBy('created_at', 'desc')->get();
        $payments = Payment::orderBy('created_at', 'desc')->get();
        $donations = Donation::orderBy('created_at', 'desc')->get();
        $audio = Audio::orderBy('created_at', 'desc')->get();
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        $health = Health::orderBy('created_at', 'desc')->get();
        $purchases = Purchase::orderBy('created_at', 'desc')->get();
        
        $weekAgo = Carbon::now()->subWeek();

        $fromDate = $request->input('from');
        $toDate = $request->input('to');

        // Validate input and set default dates if not provided
        if (empty($fromDate) || empty($toDate)) {
            // Set default dates (e.g., one week ago and today)
            $fromDate = Carbon::now()->subWeek()->format('Y-m-d');
            $toDate = Carbon::now()->format('Y-m-d');
            $dayCount = 7;
        } else {
            $dayCount = Carbon::parse($fromDate)->diffInDays(Carbon::parse($toDate));
        }

        $countDevotions = View::where('model_name', "Devotion")
                    ->whereDate('created_at', '>=', $fromDate)
                    ->whereDate('created_at', '<=', $toDate)
                    ->count();

        $countNews = View::where('model_name', "News")
                    ->whereDate('created_at', '>=', $fromDate)
                    ->whereDate('created_at', '<=', $toDate)
                    ->count();

        $countHealth = View::where('model_name', "Health")
                    ->whereDate('created_at', '>=', $fromDate)
                    ->whereDate('created_at', '<=', $toDate)
                    ->count();

        $countReels = View::where('model_name', "Reels")
                    ->whereDate('created_at', '>=', $fromDate)
                    ->whereDate('created_at', '<=', $toDate)
                    ->count();

        $countEbook = View::whereDate('created_at', '>=', $weekAgo)
                    ->where('model_name', "Ebook")
                    ->count();

        $countEvent = View::where('model_name', "Event")
                    ->whereDate('created_at', '>=', $fromDate)
                    ->whereDate('created_at', '<=', $toDate)
                    ->count();
        
        

        //dd($count);

        return view('dashboard', compact('devotions', 'purchases', 'users', 'admins', 'events', 'news', 'payments', 'donations', 'audio', 'feedbacks', 'health',
        'countDevotions',
        'countNews',
        'countHealth',
        'countReels',
        'countEbook',
        'countEvent',
        'dayCount',
        'toDate',
        'fromDate',
    ));

    }

    public function analytics(Request $request) {
        $users = User::orderBy('created_at', 'desc')->get();
        $admins = User::where('is_admin', 1)->get();
        $devotions = Devotion::orderBy('created_at', 'desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        $news = Newspaper::orderBy('created_at', 'desc')->get();
        $payments = Payment::orderBy('created_at', 'desc')->get();
        $donations = Donation::orderBy('created_at', 'desc')->get();
        $audio = Audio::orderBy('created_at', 'desc')->get();
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        $health = Health::orderBy('created_at', 'desc')->get();
        $purchases = Purchase::orderBy('created_at', 'desc')->get();

        $fromDate = $request->input('from');
        $toDate = $request->input('to');

        // Validate input and set default dates if not provided
        if (empty($fromDate) || empty($toDate)) {
            // Set default dates (e.g., one week ago and today)
            $fromDate = Carbon::now()->subWeek()->format('Y-m-d');
            $toDate = Carbon::now()->format('Y-m-d');
        }

        // Query the views within the specified date range
        $countDevotions = View::whereDate('created_at', '>=', $fromDate)
                 ->whereDate('created_at', '<=', $toDate)
                 ->get();

        return view('dashboard', compact('devotions', 'purchases', 'users', 'admins', 'events', 'news', 'payments', 'donations', 'audio', 'feedbacks', 'health',
        'countDevotions',
        'countNews',
        'countHealth',
        'countReels',
        'countEbook',
        'countEvent',
        'counts',
    ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function error() {
        return view('auth.verified');
    }




    //Push Notifications
    public function updateToken(Request $request){
        try{
            $request->user()->update(['fcm_token'=>$request->token]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }
}
