<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Audioserie;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audio = Audio::orderBy('created_at', 'desc')->paginate();
        return view('series.audio.index', compact('audio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $series = Audioserie::orderBy('created_at', 'desc')->get();
        return view('series.audio.new', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
            'audio' => 'required|mimes:mp3',
            'audioserie_id' => 'required',
        ]);

        $audioPath = request('audio')->store('audio', 'public');

        $imagePath = request('thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $audio = new Audio;
        $audio->title = $request->title;
        $audio->thumbnail = $imagePath;
        $audio->body = $request->body;
        $audio->audio = $audioPath;
        $audio->audioserie_id = $request->audioserie_id;
        $audio->save();

        $audioID = $audio->id;

        return redirect()->route('audio.edit', $audioID)->with('message', 'This audio is published successfully.');
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
        //dd($id);
        $audio = Audio::find($id);
        $title = $audio->title;
        $thumbnail = $audio->thumbnail;
        $audioFile = $audio->audio;
        $body = $audio->body;
        $audioserie_id = $audio->audioserie_id;
        $series = Audioserie::orderBy('created_at', 'desc')->get();

        return view('series.audio.edit', compact('title', 'series', 'audioserie_id', 'thumbnail', 'body', 'audioFile', 'id'));
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
        request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'audio' => 'mimes:mp3',
            'body' => 'required',
            'audioserie_id' => 'required',
        ]);

        //store thumbnail
        //store image file in public/books/images
        if ($request->has('thumbnail')) {
            $imagePath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        if ($request->has('audio')) {
            $audioPath = request('audio')->store('audio', 'public');
        }

        $audio = Audio::find($id);
        $audio->title = $request->title;
        if ($request->has('thumbnail')) {
            $audio->thumbnail = $imagePath;
            }
        if ($request->has('audio')) {
                $audio->audio = $audioPath;
                }
        $audio->body = $request->body;
        $audio->audioserie_id = $request->audioserie_id;
        $audio->save();
        
        $audioID = $id;
        return redirect()->route('audio.edit', $audioID)->with('message', 'This audio has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audio = Audio::find($id);
        $audio->delete();

        return redirect()->back()->with('message', 'One audio has been deleted from this record.');
    }
}
