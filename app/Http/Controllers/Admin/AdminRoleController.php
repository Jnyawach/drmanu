<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers=User::role('Manager')->get()->count();
        $user=User::role('User')->get()->count();
        $permissions=Permission::all();
        return  view('admin.roles.index', compact('permissions','managers','user'));
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
        //
        $permission=Permission::create([
            'name'=>$request->permission,
            'guard_name'=>$request->guard_name
        ]);
        return  redirect()->back()->with('status','Permission created Successfully');
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
        $permission=Permission::findOrFail($id);
        $permission->update([
            'name'=>$request->permission,
            'guard_name'=>$request->guard_name
        ]);
        return  redirect()->back()->with('status','Permission updated Successfully');
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
        $permission=Permission::findOrFail($id);
        $permission->delete();
        return  redirect()->back()->with('status','Permission deleted Successfully');
    }
}
