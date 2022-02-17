<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogStatus extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        //
        $validated=$request->validate([
            'status_id'=>'required|integer|max:10'
        ]);
        $post=Blog::findOrFail($id);

        $post->update([
            'status_id'=>$validated['status_id']
        ]);
        return redirect()->back()
            ->with('status','Post Status Updated Successfully');
    }
}
