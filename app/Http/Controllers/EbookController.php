<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebooks = Ebook::orderBy('id', 'desc')->get();
        return view('ebooks.index', compact('ebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ebooks.new');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
            'published' => '',
        ]);

        //$imagePath = request('image')->store('ebooks', 'public');
        //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $imagePath = request('image')->store('ebooks', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));

        // Adjust the dimensions for mobile devices
        $maxWidth = 600; // Set the desired maximum width for mobile
        $maxHeight = 800; // Set the desired maximum height for mobile

        // Resize the image while preserving the aspect ratio
        $image->resize($maxWidth, $maxHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save();

        $ebook = new Ebook();
        $ebook->publish = $request->published;
        $ebook->title = $request->title;
        $ebook->body = $request->body;
        $ebook->image = $imagePath;
        $ebook->save();
        
        return redirect()->route('ebooks.edit', $ebook->id)->with('message', 'successfully uploaded.');
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
        $ebook = Ebook::find($id);
        return view('ebooks.edit', compact('ebook'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
            'published' => '',
        ]);

        if ($request->has('image')) {
        //$imagePath = request('image')->store('ebooks', 'public');
        //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $imagePath = request('image')->store('ebooks', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));

        // Adjust the dimensions for mobile devices
        $maxWidth = 600; // Set the desired maximum width for mobile
        $maxHeight = 800; // Set the desired maximum height for mobile

        // Resize the image while preserving the aspect ratio
        $image->resize($maxWidth, $maxHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save();
        }

        $ebook = Ebook::find($id);
        $ebook->publish = $request->published;
        $ebook->title = $request->title;
        $ebook->body = $request->body;
        if ($request->has('image')) {
        $ebook->image = $imagePath;
        }
        $ebook->save();
        
        return redirect()->back()->with('message', 'successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ebook = Ebook::find($id);
        $ebook->delete();
        return redirect()->back()->with('message', 'successfully deleted.');
    }
}
