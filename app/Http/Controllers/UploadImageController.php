<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('image');
    }

/* index function */

    public function save(Request $request)
    {
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');
        $save = new Photo;
        $save->name = $name;
        $save->path = $path;
        $save->save();
        return redirect('upload-image')->with('status', 'Image Has been uploaded');
        $path = $request->file('image')->store('public/images');
    }
}
