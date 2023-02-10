<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Newspaper::orderBy('created_at', 'desc')->get();
        return view('news.index', compact('news'));
    }

    public function publishedNews() {

    }

    public function unpublishedNews() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.new');
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
            'published' => '',
        ]);

        $imagePath = request('thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $new = new Newspaper;
        $new->title = $request->title;
        $new->thumbnail = $imagePath;
        $new->body = $request->body;
        $new->published = $request->published;
        $new->save();

        $newID = $new->id;

        return redirect()->route('news.edit', $newID)->with('message', 'This news is published successfully.');
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
        $new = Newspaper::find($id);
        $title = $new->title;
        $thumbnail = $new->thumbnail;
        $body = $new->body;
        $published = $new->published;

        return view('news.edit', compact('title', 'published', 'thumbnail', 'body', 'id'));
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
            'published' => 'required'
        ]);

        //store thumbnail
        //store image file in public/books/images
        if ($request->has('thumbnail')) {
            $imagePath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        $new = Newspaper::find($id);
        $new->title = $request->title;
        if ($request->has('thumbnail')) {
            $new->thumbnail = $imagePath;
            }
        $new->body = $request->body;
        $new->published = $request->published;
        $new->save();
        
        $newID = $id;
        return redirect()->route('news.edit', $newID)->with('message', 'This news is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = Newspaper::find($id);
        $new->delete();

        return redirect()->back()->with('message', 'One News has been deleted from this record.');
    }
}
