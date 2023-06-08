<?php

namespace App\Http\Controllers;

use App\Models\Reel;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ReelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reels = Reel::orderBy('id', 'desc')->get();
        return view('reels.index', compact('reels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reels.new');
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
        // Validate the uploaded file
        $request->validate([
            'title' => 'required',
            'published' => 'required',
            'file' => 'required|mimetypes:image/jpeg,image/png,video/mp4,video/quicktime'
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Determine the MIME type of the file
        $mimeType = $file->getMimeType();

        if (str_starts_with($mimeType, 'image')) {
            //dd('image');
            // It's an image file
            $imagePath = request('file')->storePublicly('reels', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
        
            // Calculate the aspect ratio of the image
            $aspectRatio = $image->width() / $image->height();
        
            // Set the maximum width for mobile screens
            $maxWidth = 640;
        
            // Calculate the new dimensions while maintaining aspect ratio
            $newWidth = min($image->width(), $maxWidth);
            $newHeight = $newWidth / $aspectRatio;
        
            // Resize the image
            $image->resize($newWidth, $newHeight);
            $image->save();

            //store info
            $reel = new Reel();
            $reel->title = $request->title;
            $reel->file = $imagePath;
            $reel->publish = $request->published;
            $reel->file_type = "image";
            $reel->save();

            return redirect()->route('reels.index', $reel->id)->with('message', "Successfully created");
        }
        elseif (str_starts_with($mimeType, 'video')) {
            // It's a video file
            //dd('video');
            $videoPath = request('file')->store('videos', 'public');
            //store info
            
            $reel = new Reel();
            $reel->title = $request->title;
            $reel->file = $videoPath;
            $reel->publish = $request->published;
            $reel->file_type = "video";
            $reel->save();

            return redirect()->route('reels.index', $reel->id)->with('message', "Successfully created");
        } 
        else {
            // Invalid file type
            return redirect()->back()->with('message', 'Invalid file type.');
        }
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
        $reel = Reel::find($id);
        return view('reels.edit', compact('reel'));
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reel = Reel::find($id);
        $reel->delete();
        return redirect()->back()->with('message', 'Reels deleted.');

    }
}
