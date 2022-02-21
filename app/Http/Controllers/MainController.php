<?php

namespace App\Http\Controllers;

use App\Http\Controllers\General\PrivacyPolicy;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Policy;
use App\Models\Resource;
use App\Models\Section;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::limit(4)->get();
        $posts=Blog::where('status_id',2)->latest()->limit(12)->get();
        $intro=$posts[0];
        $header=$posts->slice(1,3);
        $you=$posts->slice(4,4);
        $trending=$posts->slice(8,4);
        $resources=Resource::where('status_id',2)->latest()->limit(4)->get();


        return  view('welcome',
            compact('categories','intro','header','you','trending','resources'));
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
        //
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

    public function advertise(){
        return view('advertise-with-us');
    }

    public function advertPolicy(){
        $policy=Policy::where('category','Advertising')->latest()->first();
        return view('advertising-policy', compact('policy'));
    }
    public function privacyPolicy(){
        $policy=Policy::where('category','Privacy')->latest()->first();
        return view('privacy-policy', compact('policy'));
    }
    public function termsPolicy(){
        $policy=Policy::where('category','Terms')->latest()->first();
        return view('terms-of-use', compact('policy'));
    }
    public function about(){

        return view('about-us');
    }
}
