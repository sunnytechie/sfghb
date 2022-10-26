<?php

namespace App\Http\Controllers;

use App\Models\Audioserie;
use Illuminate\Http\Request;

class AudioSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Audioserie::orderBy('created_at', 'desc')->with('audio')->paginate();
        
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.new');
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
            'body' => 'required',
        ]);
        $serie = new Audioserie;
        $serie->title = $request->title;
        $serie->body = $request->body;
        $serie->save();

        $serieID = $serie->id;

        return redirect()->route('audioseries.edit', $serieID)->with('message', 'This series is published successfully.');
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
        $serie = Audioserie::find($id);
        $title = $serie->title;
        $body = $serie->body;

        return view('series.edit', compact('title', 'body', 'id'));
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
            'body' => 'required',
        ]);


        $serie = Audioserie::find($id);
        $serie->title = $request->title;
        $serie->body = $request->body;
        $serie->save();
        
        $serieID = $id;
        return redirect()->route('audioseries.edit', $serieID)->with('message', 'This series is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Audioserie::find($id);
        $serie->delete();

        return redirect()->back()->with('message', 'One series has been deleted from this record.');
    }
}
