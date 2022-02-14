<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users=User::all();
        return  view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::pluck('name','id');

        return  view('admin.users.create', compact('roles'));

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
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'cellphone' => ['required', 'string', 'max:255'],
            'status' => ['required', 'integer', 'max:5'],
            'role' => ['required', 'integer', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user=User::create([
            'name'=>$validated['name'],
            'lastname'=>$validated['lastname'],
            'cellphone'=>$validated['cellphone'],
            'status'=>$validated['status'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
        ]);
        $role=Role::findOrFail($validated['role']);

        $user->assignRole($role);
        return redirect('admin/users')
            ->with('status','User Successfully created');

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
        $user=User::findOrFail($id);
        return view('admin.users.show', compact('user'));
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
        $roles=Role::pluck('name','id');
        $user=User::findOrFail($id);
        return  view('admin.users.edit', compact('user','roles'));
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
        $user=User::findOrFail($id);
        $validated=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],

            'cellphone' => ['required', 'string', 'max:255'],
            'status'=>['required'],


        ]);
        if (!empty($request->role)){
            $role=Role::findOrFail($request->role);

            $user->syncRoles($role);
        }
        $user->update([
            'name'=>$validated['name'],
            'lastname'=>$validated['lastname'],
            'status'=>$validated['status']
        ]);

        return redirect('admin/users')
            ->with('status','User Successfully Updated');
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
        $user=User::findOrFail($id);
        $user->delete();
        return  redirect('admin/users')
            ->with('status','User deleted successfully');

    }
}
