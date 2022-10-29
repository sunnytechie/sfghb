<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->paginate();
        return view('feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback.new');
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
            'title' => '',
            'body' => 'required',
        ]);

        $feedback = new Feedback;
        $feedback->title = $request->title;
        $feedback->body = $request->body;
        $feedback->save();

        $feedbackID = $feedback->id;

        return redirect()->route('feedback.edit', $feedbackID)->with('message', 'This feedback is published successfully.');
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
         $feedback = Feedback::find($id);
         $title = $feedback->title;
         $body = $feedback->body;
 
         return view('feedback.edit', compact('title', 'body', 'id'));
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

        $feedback = Feedback::find($id);
        $feedback->title = $request->title;
        $feedback->body = $request->body;
        $feedback->save();
        
        $feedbackID = $id;
        return redirect()->route('feedback.edit', $feedbackID)->with('message', 'This feedback is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();

        return redirect()->back()->with('message', 'A feedback has been deleted from this record.');
    }
}
