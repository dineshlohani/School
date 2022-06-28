<?php

namespace App\Http\Controllers;
use Response;
use App\Models\SchoolType;
use Illuminate\Http\Request;

class SchoolTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SchoolType::all();
        return view('schooltype.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('schooltype.add')->render();
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
            'school_type'   => 'required',
            
        ]);
        SchoolType::create($validatedData);
        return redirect('/school-type')->with('success', 'सेव गर्न सफल !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolType  $schoolType
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolType $schoolType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolType  $schoolType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $st = $request->get('id');
        $row = SchoolType::find($st);
        $view = view('schooltype.edit',compact('row'))->render();
        return Response::json(['status' => 200, 'view' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolType  $schoolType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolType $schoolType ,$id)
    {
        $validatedData = $request->validate([
            'school_type'         => 'required',
        ]);
        SchoolType::where('id', $id)->update($validatedData);
        return redirect('/school-type')->with('success', 'अपडेट सफल !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolType  $schoolType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolType $schoolType)
    {
        //
    }
}
