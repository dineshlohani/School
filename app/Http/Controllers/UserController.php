<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if(! Auth()->user()->can('view-user')) {
            return redirect('/dashboard')->with('access', 'Permission Denied');
        }
        $users = User::with(['bhumika'])->where('id','<>', 1)->get();
        return view('auth.userlist',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Auth()->user()->can('add-user')) {
            return redirect('/dashboard')->with('access', 'Permission Denied');
        }
        $roles = Role::all();
        return view('auth.register',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'designation'   => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'role_id'       => 'required',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        User::create($validatedData);
        return redirect('/users')->with('success', 'Permission Denied');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        if(! Auth()->user()->can('edit-user')) {
            return redirect('/dashboard')->with('access', 'Permission Denied');
        }
        if(! is_numeric($id)) {
            abort(404);
        }
        $roles = Role::all();
        $user = User::find($id);
        return view('auth.useredit', compact('user','roles'));
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
        if(! is_numeric($id)) {
            abort(404);
        }
        $validatedData = $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'designation'   => 'required',
            'username'      => 'required',
            'role_id'       => 'required',
        ]);
        if(isset($request->password)){
            $validatedData['password'] = Hash::make($request->password);
        }
        User::where('id', $id)->update($validatedData);
        return redirect('/users')->with('success', 'Successfully updated');
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
}
