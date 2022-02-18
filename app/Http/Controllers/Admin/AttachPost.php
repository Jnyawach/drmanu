<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class AttachPost extends Controller
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
        $section=Section::findOrFail($id);
        $section->blogs()->attach($request->blog_id);
        return redirect()->back()
            ->with('status','Post attached Successfully');
    }
}
