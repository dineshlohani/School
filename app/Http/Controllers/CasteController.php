<?php

namespace App\Http\Controllers;
use Response;
use App\Models\Caste;
use Illuminate\Http\Request;

class CasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Caste::all();
        return view('caste.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('caste.add')->render();
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
        Caste::create($validatedData);
        return redirect('/caste')->with('success', 'सेव गर्न सफल !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function show(Caste $caste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $st = $request->get('id');
        $row = Caste::find($st);
        $view = view('caste.edit',compact('row'))->render();
        return Response::json(['status' => 200, 'view' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caste $caste,$id)
    {
        $validatedData = $request->validate([
            'name'         => 'required',
        ]);
        Caste::where('id', $id)->update($validatedData);
        return redirect('/caste')->with('success', 'अपडेट सफल !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caste $caste)
    {
        //
    }
}