<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Permission::get();
        return view('permissions.index', compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('permissions.add')->render();
        return Response::json(['status' => 200, 'view' => $view]);
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
            'name'         => 'required',
        ]);
        Permission::create($validatedData);
        return redirect()->route('modules')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data = Permission::all();
        return view('permissions.view', compact('data','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $eid = $request->get('id');
        $row = Permission::find($eid);
        $view = view('permissions.edit',compact('row'))->render();
        return Response::json(['status' => 200, 'view' => $view]);
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
        $validatedData = $request->validate([
            'name'          => 'required',
        ]);
        Permission::where('id', $id)->update($validatedData);
        return redirect('/modules')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createPermission(Request $request, $id) {
        if(! Auth()->user()->can('set-user-permission')) {
            return redirect('/dashboard')->with('access', 'Permission Denied!!!');
        }
        $user           = User::find($id);
        $premission     = $request->get('permissions');
        $setPremission  = array();
        foreach($premission as $term){
            $setPremission[] = $term;
        }
        $user->syncPermissions($setPremission);
        return redirect('show-modules/'.$id)->with('success','अनुमति दिन सफल हुनुभएको छ');
    }

    //revoke permission
    public function revokeUserPermission($userid, $permission) {
        $user = User::find($userid);
        $user->revokePermissionTo($permission);
        return redirect('show-modules/'.$userid)->with('success','अनुमति दिन सफल हुनुभएको छ');
    }
}
