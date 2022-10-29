<?php

namespace App\Http\Controllers;

use App\Models\Socail;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = Socail::orderBy('created_at', 'desc')->first();
        $id = $social->id;
        $instagram = $social->instagram;
        $twitter = $social->twitter;
        $facebook = $social->facebook;
        $phone = $social->phone;
        $email = $social->email;
        return view('pages.social', compact('social', 'id', 'instagram', 'twitter', 'facebook', 'phone', 'email'));
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
        //dd($request->all());
        request()->validate([
            'instagram' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $live = Socail::find($id);
        $live->instagram = $request->instagram;
        $live->twitter = $request->twitter;
        $live->facebook = $request->facebook;
        $live->phone = $request->phone;
        $live->email = $request->email;
        $live->save();

        return redirect()->back()->with('message', 'The Social media handles has been updated successfully.');
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
}
