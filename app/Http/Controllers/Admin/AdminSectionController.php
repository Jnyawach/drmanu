<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections=Section::all();
        return view('admin.sections.index', compact('sections'));
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
        $validated=$request->validate(['section'=>'required|string|max:50']);

        $section=Section::create(['name'=>$validated['section']]);
        return  redirect()->back()
            ->with('status','Section created Successfully');
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
        $section=Section::findOrFail($id);
        return  view('admin.sections.show', compact('section'));
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
        $section=Section::findOrFail($id);
        $validated=$request->validate(['section'=>'required|string|max:50']);

        $section->update(['name'=>$validated['section']]);
        return  redirect()->back()
            ->with('status','Section Updated Successfully');
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
        $section=Section::findOrFail($id);
        $section->delete();
        return  redirect()->back()
            ->with('status','Section Deleted Successfully');
    }

    public function attachPost ($id){
        //Product add to promotion
        $section=Section::findOrFail($id);
        $blogs=Blog::where('status_id',2)->get();
        return view('admin/sections/attach-post',compact('blogs','section'));
    }
}
