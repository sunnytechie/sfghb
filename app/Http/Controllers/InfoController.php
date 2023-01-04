<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Info::orderBy('created_at', 'desc')->first();
        $id = $info->id;
        $about_us = $info->about_us;
        $terms = $info->terms;
        $contact_us = $info->contact_us;
        $recommend = $info->recommend;
        $privacy_policy = $info->privacy_policy;
        return view('info.index', compact('about_us', 'id', 'terms', 'contact_us', 'recommend', 'privacy_policy'));
    }

    public function aboutUs()
    {
        $info = Info::orderBy('created_at', 'desc')->first();
        $id = $info->id;
        $about_us = $info->about_us;

        return view('info.about', compact('about_us', 'id'));
    }

    public function termsCondition()
    {
        $info = Info::orderBy('created_at', 'desc')->first();
        $id = $info->id;
        $terms = $info->terms;
        return view('info.terms', compact('terms', 'id'));
    }

    public function contactUs()
    {
        $info = Info::orderBy('created_at', 'desc')->first();
        $id = $info->id;
        $contact_us = $info->contact_us;
        return view('info.contact', compact('contact_us', 'id'));
    }

    public function recommended()
    {
        $info = Info::orderBy('created_at', 'desc')->first();
        $recommend = $info->recommend;
        $id = $info->id;
        return view('info.recommend', compact('recommend', 'id'));
    }

    public function privacyPolicy()
    {
        $info = Info::orderBy('created_at', 'desc')->first();
        $id = $info->id;
        $privacy_policy = $info->privacy_policy;
        return view('info.policy', compact('privacy_policy', 'id'));
    }

    public function privacyPolicyPage()
    {
        $info = Info::orderBy('created_at', 'desc')->first();
        $id = $info->id;
        $privacy_policy = $info->privacy_policy;
        return view('policy', compact('privacy_policy', 'id'));
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
        //
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
        //
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
        //Using If it has for all request
        //Add validation to the html input

        $info = Info::find($id);
        if ($request->has('about_us')) {
        $info->about_us = $request->about_us;
        }
        if ($request->has('terms')) {
        $info->terms = $request->terms;
        }
        if ($request->has('contact_us')) {
        $info->contact_us = $request->contact_us;
        }
        if ($request->has('recommend')) {
        $info->recommend = $request->recommend;
        }
        if ($request->has('privacy_policy')) {
        $info->privacy_policy = $request->privacy_policy;
        }
        $info->save();

        return redirect()->back()->with('message', 'This Information has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
