<?php

namespace App\Http\Controllers;
use Response;
use App\Models\SchoolDetails;
use App\Models\SchoolType;
use Illuminate\Http\Request;
use DB;

class SchoolDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DB::table('school_details')->paginate(5);
        $data = SchoolDetails::with('school')->paginate(5);
        return view('schooldetails.list', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = SchoolType::all();
        $view = view('schooldetails.add', compact('type'))->render();
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
            'school_type'         => 'required',
            'school_address'         => 'required',
            'school_commence_date'         => 'required',
            'school_name'         => 'required',
        ]);
        SchoolDetails::create($validatedData);
        return redirect('/school-details')->with('success', 'सेव गर्न सफल !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolDetails  $schoolDetails
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolDetails $schoolDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolDetails  $schoolDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $type = SchoolType::all();
        $st = $request->get('id');
        $row = SchoolDetails::find($st);
        $view = view('schooldetails.edit',compact('row','type'))->render();
        return Response::json(['status' => 200, 'view' => $view]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolDetails  $schoolDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolDetails $schoolDetails,$id)
    {
        $validatedData = $request->validate([
            'school_type'         => 'required',
            'school_address'         => 'required',
            'school_commence_date'         => 'required',
            'school_name'         => 'required',
        ]);
        SchoolDetails::where('id', $id)->update($validatedData);
        return redirect('/school-details')->with('success', 'अपडेट सफल !!!');
    }
    /**
     * Remove the specified resource from storage.cl
     *
     * @param  \App\Models\SchoolDetails  $schoolDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolDetails $schoolDetails,$id)
    {
        SchoolDetails::where('id', $id)->delete();
        return redirect('/school-details')->with('success', 'बिद्यालय विवरण हटाउन सफल !!!');
    }
}
