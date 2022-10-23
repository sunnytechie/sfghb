<?php

namespace App\Http\Controllers;

use App\Models\Devotion;
use Illuminate\Http\Request;

class DevotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devotions = Devotion::orderBy('created_at', 'desc')->paginate();
        return view('devotions.index', compact('devotions'));
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
            'thumbnail' => ['required', 'image'],
            'body' => 'required',
            'reading' => 'required',
            'read_date' => 'required',
            'published' => '',
        ]);

        $devotion = new Devotion;
        $devotion->title = $request->title;
        $devotion->thumbnail = $request->thumbnail;
        $devotion->body = $request->body;
        $devotion->reading = $request->reading;
        $devotion->read_date = $request->read_date;
        $devotion->published = $request->published;
        $devotion->save();

        $devotionID = $devotion->id;

        return redirect()->route('devotions.edit', $devotionID)->with('message', 'devotion is published successfully.');
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
        $body = $devotion->body;
        $reading = $devotion->reading;
        $read_date = $devotion->read_date;
        $published = $devotion->published;

        return view('devotions.edit', compact('title', 'published', 'thumbnail', 'body', 'reading', 'read_date', 'id'));
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
            'body' => 'required',
            'reading' => 'required',
            'read_date' => 'required',
            'published' => 'required'
        ]);

        $devotion = Devotion::find($id);
        $devotion->title = $request->title;
        //if has thumbnail
        //$devotion->thumbnail = $request->thumbnail;
        //endif
        $devotion->body = $request->body;
        $devotion->reading = $request->reading;
        $devotion->read_date = $request->read_date;
        $devotion->published = $request->published;
        $devotion->save();
        
        $devotionID = $id;
        return redirect()->route('devotions.edit', $devotionID)->with('message', 'devotion updated successfully');
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

        return redirect()->back()->with('message', 'devotion has been deleted.');
    }
}
