<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->get();
        return view('pages.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.faq.new');
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

        $faq = new Faq;
        $faq->title = $request->title;
        $faq->body = $request->body;
        $faq->save();

        $faqID = $faq->id;

        return redirect()->route('faq.edit', $faqID)->with('message', 'This faq is published successfully.');
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
         $faq = Faq::find($id);
         $title = $faq->title;
         $body = $faq->body;
 
         return view('pages.faq.edit', compact('title', 'body', 'id'));
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

        $faq = Faq::find($id);
        $faq->title = $request->title;
        $faq->body = $request->body;
        $faq->save();
        
        $faqID = $id;
        return redirect()->route('faq.edit', $faqID)->with('message', 'This faq is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->back()->with('message', 'One faq has been deleted from this record.');
    }
}
