<?php

namespace App\Http\Controllers;

use App\Models\Devotion;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DevotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devotions = Devotion::orderBy('read_date', 'desc')->get();
        
        return view('devotions.index', compact('devotions'));
    }

    public function publishedDevotion() {

    }

    public function unpublishedDevotion() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devotions.new');
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
            'audio' => 'mimes:mp3',
            'body' => 'required',
            'reading' => 'required',
            'read_date' => 'required',
            'published' => '',
            'anchor_bible_text' => '',
            'anchor_bible_chapter_verse' => '',
            'bible_reading_chapter_verse' => '',
            'prayer' => '',
            'further_reading' => '',
        ]);

        if ($request->has('audio')) {
            $audioPath = request('audio')->store('audio', 'public');
        }

        $imagePath = request('thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $devotion = new Devotion;
        $devotion->title = $request->title;
        $devotion->thumbnail = $imagePath;
        if ($request->audio) {
            $devotion->audio = $audioPath;
        }
        $devotion->body = $request->body;
        $devotion->reading = $request->reading;
        $devotion->read_date = $request->read_date;
        $devotion->published = $request->published;
        $devotion->anchor_bible_text = $request->anchor_bible_text;
        $devotion->anchor_bible_chapter_verse = $request->anchor_bible_chapter_verse;
        $devotion->bible_reading_chapter_verse = $request->bible_reading_chapter_verse;
        $devotion->prayer = $request->prayer;
        $devotion->further_reading = $request->further_reading;
        $devotion->save();

        $devotionID = $devotion->id;

        return redirect()->route('devotions.edit', $devotionID)->with('message', 'This devotion is published successfully.');
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
        $devotion = Devotion::find($id);
        $title = $devotion->title;
        $thumbnail = $devotion->thumbnail;
        $audioFile = $devotion->audio;
        $body = $devotion->body;
        $reading = $devotion->reading;
        $read_date = $devotion->read_date;
        $published = $devotion->published;

        return view('devotions.edit', compact('title', 'devotion', 'published', 'audioFile', 'thumbnail', 'body', 'reading', 'read_date', 'id'));
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
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'mimes:mp3',
            'body' => 'required',
            'reading' => 'required',
            'read_date' => 'required',
            'published' => 'required',
            'anchor_bible_text' => '',
            'anchor_bible_chapter_verse' => '',
            'bible_reading_chapter_verse' => '',
            'prayer' => '',
            'further_reading' => '',
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

        $devotion = Devotion::find($id);
        $devotion->title = $request->title;
        if ($request->has('thumbnail')) {
            $devotion->thumbnail = $imagePath;
            }
            if ($request->has('audio')) {
                $devotion->audio = $audioPath;
                }
        $devotion->body = $request->body;
        $devotion->reading = $request->reading;
        $devotion->read_date = $request->read_date;
        $devotion->published = $request->published;
        $devotion->anchor_bible_text = $request->anchor_bible_text;
        $devotion->anchor_bible_chapter_verse = $request->anchor_bible_chapter_verse;
        $devotion->bible_reading_chapter_verse = $request->bible_reading_chapter_verse;
        $devotion->prayer = $request->prayer;
        $devotion->further_reading = $request->further_reading;
        $devotion->save();
        
        $devotionID = $id;
        return redirect()->route('devotions.edit', $devotionID)->with('message', 'This devotion has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $devotion = Devotion::find($id);
        $devotion->delete();

        return redirect()->back()->with('message', 'One devotion has been deleted from this record.');
    }
}
