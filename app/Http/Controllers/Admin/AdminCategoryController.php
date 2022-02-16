<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
        return  view('admin.categories.index',compact('categories'));
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
        $validated=$request->validate([
            'name'=>'required|string|max:25',
            'status'=>'required|max:1',
            'grey-icon'=>'required|image|mimes:png|max:2048',
            'orange-icon'=>'required|image|mimes:png|max:2048'
        ]);
        $category=Category::create([
            'name'=>$validated['name'],
            'status'=>$validated['status']
        ]);
        if($grey=$request->file('grey-icon')) {
            $category->addMedia($grey)->toMediaCollection('grey-icon');

        }
        if( $orange=$request->file('orange-icon')){
            $category->addMedia($orange)->toMediaCollection('orange-icon');
        }

        return  redirect()->back()->with('status','Category added Successfully');
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
        $category=Category::findBySlugOrFail($id);

        return  view('admin.categories.show', compact('category',));
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
        $category=Category::findOrFail($id);
        $validated=$request->validate([
            'name'=>'required|string|max:25',
            'status'=>'required',
            'grey-icon'=>'required|image|mimes:png|max:2048',
            'orange-icon'=>'required|image|mimes:png|max:2048'
        ]);
        $category->update([
            'name'=>$validated['name'],
            'status'=>$validated['status']
        ]);

        if($files=$request->file('grey-icon')) {
            if ( $category->getMedia('grey-icon')->count()>0){
                 $category->clearMediaCollection('grey-icon');
                 $category->addMedia($files)->toMediaCollection('grey-icon');
            }else{
                 $category->addMedia($files)->toMediaCollection('grey-icon');
            }

        }
        if($files=$request->file('orange-icon')) {
            if ( $category->getMedia('orange-icon')->count()>0){
                $category->clearMediaCollection('orange-icon');
                $category->addMedia($files)->toMediaCollection('orange-icon');
            }else{
                $category->addMedia($files)->toMediaCollection('orange-icon');
            }

        }

        return  redirect()->back()->with('status','Category added Successfully');
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
        $category=Category::findOrFail($id);
        $category->delete();
        return  redirect()->back()->with('status','Category deleted Successfully');
    }
}
