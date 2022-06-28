<?php

namespace App\Http\Controllers;
use Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class RoleController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Auth()->user()->can('view-role')) {
            return redirect('/dashboard')->with('access', 'Permission Denied');
        }
        $data = Role::all();
        return view('role.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Auth()->user()->can('add-role')) {
            return redirect('/dashboard')->with('access', 'Permission Denied');
        }
        $view = view('role.add_role')->render();
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
            'name'          => 'required',
        ]);
        Role::create($validatedData);
        return redirect('/roles')->with('success', 'Successfully created');
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
    public function edit(Request $request)
    {
        if(! Auth()->user()->can('edit-role')) {
            return redirect('/dashboard')->with('access', 'Permission Denied');
        }
        $id = $request->get('id');
        $row = Role::find($id);
        $view = view('role.edit_role',compact('row'))->render();
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
        Role::where('id', $id)->update($validatedData);
        return redirect('/roles')->with('success', 'Successfully updated');
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
