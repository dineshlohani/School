<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachersEducationDetail;
use App\Models\TeachersPersonalDetail;
use App\Http\Requests\TeacherEducationDetails;


class TeachersEducationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = TeachersPersonalDetail::with('educationDetails')->where('id', $id)->first();
        return view('teachersed.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $profile = TeachersPersonalDetail::find($id);
        return view('teachersed.add',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherEducationDetails $request)
    {
        $validated = $request->validated();
        if($request->file('slc_certificate_upload')) {
            $type = "slc-certificate";
            $slccertificate = fileUploads($request->file('slc_certificate_upload'), $type);
            $validated['slc_certificate_upload'] = $slccertificate;
        }
        if($request->file('slc_marksheet_upload')) {
            $type = "slc-marksheet";
            $slcmarksheet = fileUploads($request->file('slc_marksheet_upload'), $type);
            $validated['slc_marksheet_upload'] = $slcmarksheet;
        }
        if($request->file('plustwo_certificate_upload')) {
            $type = "plus-two-certificate";
            $plustwo = fileUploads($request->file('plustwo_certificate_upload'), $type);
            $validated['plustwo_certificate_upload'] = $plustwo;
        }
        if($request->file('plustwo_marksheet_upload')) {
            $type = "plus-two-marksheet";
            $plustwomark = fileUploads($request->file('plustwo_marksheet_upload'), $type);
            $validated['plustwo_marksheet_upload'] = $plustwomark;
        }
        if($request->file('plustwo_transcript_upload')) {
            $type = 'plus-two-transcript';
            $plustrans = fileUploads($request->file('plustwo_transcript_upload'), $type);
            $validated['plustwo_transcript_upload'] = $plustrans;
        }
        if($request->file('bachelor_certificate_upload')) {
            $type = "bachelor-cetrificate";
            $bacherlomarks = fileUploads($request->file('bachelor_certificate_upload'), $type);
            $validated['bachelor_certificate_upload'] = $bacherlomarks;
        }
        if($request->file('bachelor_marksheet_upload')) {
            $type = "bachelor-marksheet";
            $bachelormarksheet = fileUploads($request->file('bachelor_marksheet_upload'), $type);
            $validated['bachelor_marksheet_upload'] = $bachelormarksheet;
        }
        if($request->file('bachelor_transcript_upload')) {
            $type = "bachelor-transcript";
            $bachelortrans = fileUploads($request->file('bachelor_transcript_upload'), $type);
            $validated['bachelor_transcript_upload'] = $bachelortrans;
        }
        if($request->file('bed_certificate_upload')) {
            $type = "bed-certificate";
            $bedcer = fileUploads($request->file('bed_certificate_upload'), $type);
            $validated['bed_certificate_upload'] = $bedcer;
        }
        if($request->file('bed_marksheet_upload')) {
            $type = "bed-marksheet";
            $bedmark = fileUploads($request->file('bed_marksheet_upload'), $type);
            $validated['bed_marksheet_upload'] = $bedmark;
        }
        if($request->file('bed_transcript_upload')) {
            $type = "bed-transcript";
            $bedtrans = fileUploads($request->file('bed_transcript_upload'), $type);
            $validated['bed_transcript_upload'] = $bedtrans;
        }
        if($request->file('masters_certificate_upload')) {
            $type = "master-certificate";
            $mascer = fileUploads($request->file('masters_certificate_upload'), $type);
            $validated['masters_certificate_upload'] = $mascer;
        }
        if($request->file('masters_marksheet_upload')) {
            $type = "master-marksheet";
            $masmark = fileUploads($request->file('masters_marksheet_upload'), $type);
            $validated['masters_marksheet_upload'] = $masmark;
        }
        if($request->file('masters_transcript_upload')) {
            $type = "master-transcript";
            $mastrans = fileUploads($request->file('masters_transcript_upload'), $type);
            $validated['masters_transcript_upload'] = $mastrans;
        }
        if($request->file('others_certificate_upload')) {
            $type = "other-certificate";
            $othersm = fileUploads($request->file('others_certificate_upload'), $type);
            $validated['others_certificate_upload'] = $othersm;
        }
        $id = TeachersEducationDetail::create($validated)->teachers_id;
        return redirect()->route('teachers-work-detail', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeachersEducationDetail  $teachersEducationDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TeachersEducationDetail $teachersEducationDetail)
    {
        $data = TeachersEducationDetail::all();
        return view('teachersed.list', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeachersEducationDetail  $teachersEducationDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row_data = TeachersEducationDetail::find($id);
        return view('teachersed.edit', compact('row_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeachersEducationDetail  $teachersEducationDetail
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherEducationDetails $request, $id)
    {
        $validated = $request->validated();
        
        if($request->hasFile('slc_certificate_upload')) {
            $type = "slc-certificate";
            $slccertificate = fileUploads($request->file('slc_certificate_upload'), $type);
            $validated['slc_certificate_upload'] = $slccertificate;
        }
        if($request->hasFile('slc_marksheet_upload')) {
            $type = "slc-marksheet";
            $slcmarksheet = fileUploads($request->file('slc_marksheet_upload'), $type);
            $validated['slc_marksheet_upload'] = $slcmarksheet;
        }
        if($request->hasFile('plustwo_certificate_upload')) {
            $type = "plus-two-certificate";
            $plustwo = fileUploads($request->file('plustwo_certificate_upload'), $type);
            $validated['plustwo_certificate_upload'] = $plustwo;
        }
        if($request->hasFile('plustwo_marksheet_upload')) {
            $type = "plus-two-marksheet";
            $plustwomark = fileUploads($request->file('plustwo_marksheet_upload'), $type);
            $validated['plustwo_marksheet_upload'] = $plustwomark;
        }
        if($request->hasFile('plustwo_transcript_upload')) {
            $type = 'plus-two-transcript';
            $plustrans = fileUploads($request->file('plustwo_transcript_upload'), $type);
            $validated['plustwo_transcript_upload'] = $plustrans;
        }
        if($request->hasFile('bachelor_certificate_upload')) {
            $type = "bachelor-cetrificate";
            $bacherlomarks = fileUploads($request->file('bachelor_certificate_upload'), $type);
            $validated['bachelor_certificate_upload'] = $bacherlomarks;
        }
        if($request->hasFile('bachelor_marksheet_upload')) {
            $type = "bachelor-marksheet";
            $bachelormarksheet = fileUploads($request->file('bachelor_marksheet_upload'), $type);
            $validated['bachelor_marksheet_upload'] = $bachelormarksheet;
        }
        if($request->hasFile('bachelor_transcript_upload')) {
            $type = "bachelor-transcript";
            $bachelortrans = fileUploads($request->file('bachelor_transcript_upload'), $type);
            $validated['bachelor_transcript_upload'] = $bachelortrans;
        }
        if($request->hasFile('bed_certificate_upload')) {
            $type = "bed-certificate";
            $bedcer = fileUploads($request->file('bed_certificate_upload'), $type);
            $validated['bed_certificate_upload'] = $bedcer;
        }
        if($request->hasFile('bed_marksheet_upload')) {
            $type = "bed-marksheet";
            $bedmark = fileUploads($request->file('bed_marksheet_upload'), $type);
            $validated['bed_marksheet_upload'] = $bedmark;
        }
        if($request->hasFile('bed_transcript_upload')) {
            $type = "bed-transcript";
            $bedtrans = fileUploads($request->file('bed_transcript_upload'), $type);
            $validated['bed_transcript_upload'] = $bedtrans;
        }
        if($request->hasFile('masters_certificate_upload')) {
            $type = "master-certificate";
            $mascer = fileUploads($request->file('masters_certificate_upload'), $type);
            $validated['masters_certificate_upload'] = $mascer;
        }
        if($request->hasFile('masters_marksheet_upload')) {
            $type = "master-marksheet";
            $masmark = fileUploads($request->file('masters_marksheet_upload'), $type);
            $validated['masters_marksheet_upload'] = $masmark;
        }
        if($request->hasFile('masters_transcript_upload')) {
            $type = "master-transcript";
            $mastrans = fileUploads($request->file('masters_transcript_upload'), $type);
            $validated['masters_transcript_upload'] = $mastrans;
        }
        if($request->hasFile('others_certificate_upload')) {
            $type = "other-certificate";
            $othersm = fileUploads($request->file('others_certificate_upload'), $type);
            $validated['others_certificate_upload'] = $othersm;
        }
        // pp($validated);
        TeachersEducationDetail::where('id', $id)->update($validated);
        return redirect()->route('teachers-education-detail-list', ['id' => $request->teachers_id])->with('success', 'अपडेट सफल');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeachersEducationDetail  $teachersEducationDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachersEducationDetail $teachersEducationDetail,$id)
    {
        TeachersEducationDetail::where('id', $id)->delete();
        return redirect('/teachers-education-detail-list')->with('success', 'हटाउन सफल 🤞🤞🤞 !!!');
    }
}