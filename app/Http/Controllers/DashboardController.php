<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Audio;
use App\Models\Event;
use App\Models\Health;
use App\Models\Payment;
use App\Models\Devotion;
use App\Models\Donation;
use App\Models\Feedback;
use App\Models\Newspaper;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('dashboard', compact('devotions', 'users', 'admins', 'events', 'news', 'payments', 'donations', 'audio', 'feedbacks', 'health'));
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
        return view('error');
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
