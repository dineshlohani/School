<?php

namespace App\Http\Controllers;
use App\Models\TeachersWorkDetails;
use App\Models\TeachersPersonalDetail;
use App\Http\Requests\TeacherValidateWorkDetails;
use Illuminate\Http\Request;

class TeachersWorkDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $workDetails =  TeachersWorkDetails::where('teachers_id',$id)->get();
        return view('teacherswd.list', compact('workDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pro = TeachersPersonalDetail::find($id);
        return view('teacherswd.add', compact('pro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherValidateWorkDetails $request)
    {
        $validated = $request->validated();
        if($request->file('perma_file_upload')) {
            $type = 'sthai-niyukti-patra';
            $perma = fileUploads($request->file('perma_file_upload'),$type);
            $validated['perma_file_upload'] = $perma;
        }
        if($request->file('perma_enroll_paper_upload')) {
            $type = 'school-enroll-niyukti';
            $enroll = fileUploads($request->file('perma_enroll_paper_upload'), $type);
            $validated['perma_enroll_paper_upload'] = $enroll;
        }
        if($request->file('perma_experience_letter_upload')) {
            $type = 'experience-letter';
            $experience = fileUploads($request->file('perma_experience_letter_upload'), $type);
            $validated['perma_experience_letter_upload'] = $experience;
        }
        if($request->file('tempo_file_upload')) {
            $type = 'temp-niyukti';
            $experience = fileUploads($request->file('tempo_file_upload'), $type);
            $validated['tempo_file_upload'] = $experience;
        }
        if($request->file('training_related_paper_upload')) {
            $type = 'training';
            $traning = fileUploads($request->file('training_related_paper_upload'), $type);
            $validated['training_related_paper_upload'] = $traning;
        }
        $id = TeachersWorkDetails::create($validated)->teachers_id;
        return redirect()->route('teachers-profile-detail',['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeachersWorkDetails  $teachersWorkDetails
     * @return \Illuminate\Http\Response
     */
    public function show(TeachersWorkDetails $teachersWorkDetails)
    {
        $data = TeachersWorkDetails::all();
        $collection = $data->groupBy('employer_type');
        $a = $collection[2];
        $b = $collection[1];
        return view('teacherswd.list', compact('a','b'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeachersWorkDetails  $teachersWorkDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row_data = TeachersWorkDetails::find($id);
        return view('teacherswd.edit', compact('row_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeachersWorkDetails  $teachersWorkDetails
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherValidateWorkDetails $request, $id)
    {
        $validated = $request->validated();
        if($request->hasFile('perma_file_upload')) {
            $type = 'sthai-niyukti-patra';
            $perma = fileUploads($request->file('perma_file_upload'),$type);
            $validated['perma_file_upload'] = $perma;
        }
        if($request->hasFile('perma_enroll_paper_upload')) {
            $type = 'school-enroll-niyukti';
            $enroll = fileUploads($request->file('perma_enroll_paper_upload'), $type);
            $validated['perma_enroll_paper_upload'] = $enroll;
        }
        if($request->hasFile('perma_experience_letter_upload')) {
            $type = 'experience-letter';
            $experience = fileUploads($request->file('perma_experience_letter_upload'), $type);
            $validated['perma_experience_letter_upload'] = $experience;
        }
        if($request->hasFile('tempo_file_upload')) {
            $type = 'temp-niyukti';
            $experience = fileUploads($request->file('tempo_file_upload'), $type);
            $validated['tempo_file_upload'] = $experience;
        }
        if($request->hasFile('training_related_paper_upload')) {
            $type = 'training';
            $traning = fileUploads($request->file('training_related_paper_upload'), $type);
            $validated['training_related_paper_upload'] = $traning;
        }
        pp($validated);
        TeachersWorkDetails::where('id', $id)->update($validated);
        return redirect('/teachers-work-detail/'.$validated['teachers_id'])->with('success', 'अपडेट सफल!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeachersWorkDetails  $teachersWorkDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachersWorkDetails $teachersWorkDetails)
    {
        //
    }
}