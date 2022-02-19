<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

class ResourceCategory extends Controller
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
        return view('admin.resources.resource-category', compact('category','statuses'));
    }
}
