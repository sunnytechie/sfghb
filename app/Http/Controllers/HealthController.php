<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healths = Health::orderBy('created_at', 'desc')->get();
        return view('health.index', compact('healths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('health.new');
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
        ]);

        $imagePath = request('thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $health = new Health;
        $health->title = $request->title;
        $health->thumbnail = $imagePath;
        $health->body = $request->body;
        $health->save();

        $healthID = $health->id;

        return redirect()->route('healths.edit', $healthID)->with('message', 'This health details is published successfully.');
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
        $health = Health::find($id);
        $title = $health->title;
        $thumbnail = $health->thumbnail;
        $body = $health->body;

        return view('health.edit', compact('title', 'thumbnail', 'body', 'id'));
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
            'body' => 'required',
        ]);

        //store thumbnail
        //store image file in public/books/images
        if ($request->has('thumbnail')) {
            $imagePath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        $health = Health::find($id);
        $health->title = $request->title;
        if ($request->has('thumbnail')) {
            $health->thumbnail = $imagePath;
            }
        $health->body = $request->body;
        $health->save();
        
        $healthID = $id;
        return redirect()->route('healths.edit', $healthID)->with('message', 'This health information has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $health = Health::find($id);
        $health->delete();

        return redirect()->back()->with('message', 'One health information has been deleted from this record.');
    }
}
