<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Youtube::orderBy('id', 'desc')->get();
        return view('youtube.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('youtube.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'required',
        ]);

        $imagePath = request('image')->store('youtube', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));

        // Adjust the dimensions for mobile devices
        $maxWidth = 1920; // Set the desired maximum width for mobile
        $maxHeight = 1080; // Set the desired maximum height for mobile

        // Resize the image while preserving the aspect ratio
        $image->resize($maxWidth, $maxHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save();

        $feed = new Youtube();
        $feed->title = $request->title;
        $feed->thumbnail = $imagePath;
        $feed->url = $request->url;
        $feed->save();

        return redirect()->route('feeds.index')->with('message', "Created successfully");
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
        $feed = Youtube::find($id);
        $feed->delete();

        return redirect()->back()->with('message', "Deleted succesffully.");
    }
}
