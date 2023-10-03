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
        $body = $live->body;
        $tags = $live->tags;
        $location = $live->location;
        $visibility = $live->visibility;
        $minister = $live->minister;

        return view('pages.livestream', compact('live', 'id', 'url', 'title', 'body', 'tags', 'location', 'visibility', 'minister'));
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
            'body' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'visibility' => '',
            'minister' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'live' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'livestream' . '_' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/livestream');
            $image->move($destinationPath, $name);
        }

        $live = Livestream::find($id);
        $live->title = $request->title;
        $live->url = $request->url;
        $live->body = $request->body;
        $live->tags = $request->tags;
        $live->location = $request->location;
        $live->visibility = $request->visibility;
        $live->minister = $request->minister;
        if ($request->hasFile('image')) {
            $live->image = $name;
        }
        $live->live = $request->live;
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
