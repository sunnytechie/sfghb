<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::orderBy('created_at', 'desc')->get();
        return view('chapters.index', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'state' => 'required',
            'chapter' => 'required',
        ]);

        $chapter = new Chapter;
        $chapter->state = $request->state;
        $chapter->chapter = $request->chapter;
        $chapter->save();

        return back()->with('message', "$request->chapter is created and added successfully, thank you.");
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
        $chapter = Chapter::find($id);
        $state = $chapter->state;
        $chapter = $chapter->chapter;

        return view('chapters.edit', compact('state', 'chapter', 'id'));
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
            'state' => 'required',
            'chapter' => 'required',
        ]);

        $chapter = Chapter::find($id);
        $chapter->state = $request->state;
        $chapter->chapter = $request->chapter;
        $chapter->save();

        $chapterID = $id;
        return redirect()->route('chapters.edit', $chapterID)->with('message', 'This chapter has been updated successfully, thank you.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();

        return redirect()->back()->with('message', 'One chapter has been deleted from this record.');  
    }
}
