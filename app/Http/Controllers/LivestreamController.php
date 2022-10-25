<?php

namespace App\Http\Controllers;

use App\Models\Livestream;
use Illuminate\Http\Request;

class LivestreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.livestream');
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
    public function edit()
    {
        $live = Livestream::orderBy('created_at', 'desc')->first();
        //dd($live);
        $id = $live->id;
        $title = $live->title;
        $url = $live->url;
        return view('pages.livestream', compact('live', 'id', 'url', 'title'));
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
            'title' => 'required',
            'url' => 'required|url',
        ]);

        $live = Livestream::find($id);
        $live->title = $request->title;
        $live->url = $request->url;
        $live->save();

        return redirect()->back()->with('message', 'Live stream video link has been updated successfully and notification sent.');
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
