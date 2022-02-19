<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class ResourceStatus extends Controller
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
        $status=Status::findOrfail($id);
        $statuses=Status::pluck('name','id');
        return view('admin.resources.resource-status', compact('status','statuses'));
    }
}
