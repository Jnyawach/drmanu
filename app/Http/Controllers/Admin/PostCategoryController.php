<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        //
        $category=Category::findBySlugOrFail($id);
        $statuses=Status::pluck('name','id');
        return view('admin.blogs.post-category', compact('category','statuses'));
    }
}
