<?php

namespace App\Http\Controllers;
use App\Models\TeachersPersonalDetail;
use App\Models\TeachersEducationDetail;
use App\Models\TeachersWorkDetails;
use App\Models\SchoolDetails;
use App\Models\Religion;
use App\Models\LicenseLevel;
use App\Models\Caste;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherPersonalDetals;
use Response;

use App\Exports\TeacherExport;
use App\Exports\ExportTeachersDetailsBySearch;
use Maatwebsite\Excel\Facades\Excel;

use Maatwebsite\Excel\Concerns\ToModel;


class TeachersPersonalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = SchoolDetails::all();
        $data = TeachersPersonalDetail::with('school','educationDetails')->get();
       // dd($data);
        $data = TeachersPersonalDetail::with('school')->paginate(5);
        return view('teacherspd.list', compact('data','schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nameschool = SchoolDetails::all();
        $caste      = Caste::all();
        $religion   = Religion::all();
        $level      = LicenseLevel::all();
        return view('teacherspd.add', compact('nameschool','religion','caste','level'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherPersonalDetals $request)
    {

        $validated = $request->validated();
        if($request->file('teachers_cit_upload')) {
            $type = "cit";
            $citFile = fileUploads($request->file('teachers_cit_upload'),$type);
            $validated['teachers_cit_upload'] = $citFile;
        }
        if($request->file('teachers_teacher_license_upload')){
            $type = 'license';
            $licuploads = fileUploads($request->file('teachers_teacher_license_upload'),$type);
            $validated['teachers_teacher_license_upload'] = $licuploads;
        }
        if($request->file('teachers_pan_upload')){
            $type = 'pan';
            $panupload = fileUploads($request->file('teachers_pan_upload'),$type);
            $validated['teachers_pan_upload'] = $panupload;
        }
        // pp($validated);
        $id = TeachersPersonalDetail::create($validated)->id;
        return redirect()->route('teachers-education-create', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeachersPersonalDetail  $teachersPersonalDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacherDetail      = TeachersPersonalDetail::with('educationDetails','workDetails')->find($id);
        $educationDetail    = TeachersEducationDetail::where('teachers_id', $id)->get();
        $workDetail         = TeachersWorkDetails::where('teachers_id', $id)->get();
        $licenseLevel       = LicenseLevel::where('id', $teacherDetail->teachers_teacher_licensestep)->first();
        return view('teacherspd.profile', compact('teacherDetail','educationDetail','workDetail','licenseLevel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeachersPersonalDetail  $teachersPersonalDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row_data = TeachersPersonalDetail::find($id);
        $schools = SchoolDetails::all();
        $caste      = Caste::all();
        $religion   = Religion::all();
        $level      = LicenseLevel::all();
        return view('teacherspd.edit', compact('row_data','schools','religion','caste','level'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeachersPersonalDetail  $teachersPersonalDetail
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherPersonalDetals $request, $id)
    {
        $validated = $request->validated();
        if($request->hasFile('teachers_cit_upload')) {
            $type = "cit";
            $citFile = fileUploads($request->file('teachers_cit_upload'),$type);
            $validated['teachers_cit_upload'] = $citFile;
        }
        if($request->hasFile('teachers_teacher_license_upload')){
            $type = 'license';
            $licuploads = fileUploads($request->file('teachers_teacher_license_upload'),$type);
            $validated['teachers_teacher_license_upload'] = $licuploads;
        }
        if($request->hasFile('teachers_pan_upload')){
            $type = 'pan';
            $panupload = fileUploads($request->file('teachers_pan_upload'),$type);
            $validated['teachers_pan_upload'] = $panupload;
        }
        TeachersPersonalDetail::where('id', $id)->update($validated);
        return redirect('/teachers-personal-list')->with('success', 'अपडेट सफल!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeachersPersonalDetail  $teachersPersonalDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachersPersonalDetail $teachersPersonalDetail,$id)
    {
        TeachersPersonalDetail::where('id', $id)->delete();
        return redirect('/teachers-personal-list')->with('success', 'हटाउन सफल !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeachersPersonalDetail  $schoolID
     * @param  \App\Models\TeachersPersonalDetail  $teachersName
     * @param  \App\Models\TeachersPersonalDetail  $teachersLicenceNo
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        //if($request->ajax()) {
            // if(Auth()->user()->role_id == 3) {
            //     $shakha = Auth()->user()->shakha_id;
            // } else {
            //     $shakha     = $request->get('shakha');
            // }
            $schoolID   = $request->schoolID;
            $name       = $request->name;
            $statusID   = $request->statusID;
            $licenceNo  = $request->licenceNo;
            
            $data       = TeachersPersonalDetail::
                            when(!empty($schoolID) , function ($query) use($schoolID){
                            return $query->where('school_id',$schoolID);
                            })->when(!empty($statusID) , function ($query) use($statusID){
                            return $query->where('teacher_enroll_status', $statusID);
                            })->when(!empty($name) , function ($query) use($name){
                                return $query->where('teachers_name_nep', 'LIKE', '%' .$name. '%');
                            })->when(!empty($licenceNo) , function ($query) use($licenceNo){
                            return $query->where('teachers_teacher_licenseno', $licenceNo);
                            })->get();
            $view = view('teacherspd.ajaxlist',compact('data','schoolID','statusID','name','licenceNo'))->render();
            return Response::json(['status' => 200, 'view' => $view]);
        // } else {
        //     echo 'invalid request';
        // }
    }

    //convert bs to ad
    public function convertBSTOAD(Request $request) {
        if($request->ajax()) {
            $bs = $request->dob;
            $ad = convertBS($bs);
            return $ad;
        } else {
           return '';
        }
    }
    // print page for teachers personal details
    public function printDetails(){
    
        $newdata = TeachersPersonalDetail::all();
        return view('printPage.teacherspdprint', compact('newdata'));    
    }
    public function printajaxDetails($schoolID, $statusID, $name, $licenceNo) {
        $schoolID = explode('-', $schoolID);
        $statusID = explode('-', $statusID);
        $name = explode('-', $name);
        $licenceNo = explode('-', $licenceNo);

        $school = $schoolID[1];
        $status =  $statusID[1];
        $sname = $name[1];
        $lno = $licenceNo[1];
        
        $newdata = TeachersPersonalDetail::
                    when(!empty($school) , function ($query) use($school){
                        return $query->where('school_id',$school);
                    })->when(!empty($status) , function ($query) use($status){
                        return $query->where('teacher_enroll_status',$status);
                    })->when(!empty($sname) , function ($query) use($sname){
                        return $query->where('teachers_name_nep',$sname);
                    })->when(!empty($lno) , function ($query) use($lno){
                        return $query->where('teachers_teacher_licenseno',$lno);
                    })->get();
        return view('printPage.teacherspdprint',compact('newdata'));
    }

    public function export() 
    {
        return Excel::download(new TeacherExport, 'शिक्षकको सुची.xlsx');
    }
    public function exportBySearch($schoolID, $statusID, $name, $licenceNo) {

        $schoolID = explode('-', $schoolID);
        $statusID = explode('-', $statusID);
        $name = explode('-', $name);
        $licenceNo = explode('-', $licenceNo);

        $school = $schoolID[1];
        $status =  $statusID[1];
        $sname = $name[1];
        $lno = $licenceNo[1];
        return Excel::download(new ExportTeachersDetailsBySearch($school, $status,$sname,$lno), 'शिक्षकको सुची.xlsx');
    }

    public function importDetails() {
        $view = view('teacherspd.importexcel')->render();
        return Response::json(['status' => 200, 'view' => $view]);
    }
    public function saveImportDetails(Request $request) {
        if($request->hasFile('file')) {
            $data   = [];
            $educationDetail = [];
            $supported_mimes = ['xls','xlsx','csv'];
            $extension = $request->file->getClientOriginalExtension();
            if(in_array($extension, $supported_mimes)) {
                $array  = Excel::toArray(new TeachersPersonalDetail(), request()->file('file'));
                foreach($array as $key =>  $val) {
                    foreach($val as $key => $d) {
                        $data[] = [
                            'id'                                    => $d[0],
                            'school_id'                             => 1,
                            'teacher_enroll_status'                 => $d[31],
                            'teachers_name_nep'                     => $d[1],
                            'teachers_name_eng'                     => $d[2],
                            'teachers_caste'                        => $d[3],
                            'teachers_religion'                     => $d[4] ,
                            'teachers_gender'                       => $d[5],
                            'teachers_mobno'                        => $d[6],
                            'teachers_email'                        => $d[7],
                            'teachers_province'                     => $d[8],
                            'teachers_zone'                         => $d[9],
                            'teachers_localadd'                     => $d[10],
                            'teachers_ward'                         => $d[11],
                            'teachers_tole'                         => $d[12],
                            'teachers_birth_place'                  => $d[13],
                            'teachers_dob_bs'                       => $d[14],
                            'teachers_dob_ad'                       => $d[15],
                            'teachers_marriage_satatus'             => $d[16],
                            'teachers_marriage_date'                => $d[17],
                            'teachers_hw_name'                      => $d[18],
                            'teachers_citno'                        => $d[19],
                            'teachers_cit_jari_date'                => $d[20],
                            'teachers_cit_jari_district'            => $d[21],
                            'teachers_gf_name'                      => $d[22],
                            'teachers_f_name'                       => $d[23],
                            'teachers_m_name'                       => $d[24],
                            'teachers_teacher_licensestep'          => $d[25],
                            'teachers_teacher_license_sub'          => $d[26],
                            'teachers_teacher_licenseno_jari_date'  => $d[27],
                            'teachers_teacher_licenseno'            => $d[28],
                            'teachers_teacher_license_upload'       => "",
                            'teachers_panno'                        => $d[29],
                            'teachers_pan_upload'                   => '',
                        ];

                        $educationDetail[] = [
                            'teachers_id'                   => $d[0],
                            'slc_school_name'               => $d[32],
                            'slc_passed_year'               => $d[33],
                            'slc_percent'                   => $d[34],
                            'slc_pass_marks'                => $d[35],
                            'slc_major_subject'             => $d[36],
                            'slc_certificate_upload'        => '',
                            'slc_marksheet_upload'          => '',

                            'plustwo_school_name'          => $d[37],
                            'plustwo_faculty'              => $d[38],
                            'plustwo_passed_year'           => $d[39],
                            'plustwo_percentage'            => $d[40],
                            'plustwo_pass_marks'            => $d[41],

                            'plustwo_school_address'        => '',
                            
                            'plustwo_certificate_upload'    => '',
                            'plustwo_marksheet_upload'      => '',
                            'plustwo_transcript_upload'     => '',

                            'bachelor_uuniversity_name'    => $d[44],
                            'bachelor_school_name'          => $d[45],
                            'bachelor_school_address'       => '',
                            'bachelor_faculty'              => $d[46],
                            'bachelor_passed_year'         => $d[47],
                            'bachelor_percentage'           => $d[48],
                            'bachelor_pass_marks'           => $d[49],
                            'bachelor_major_subject'        => $d[50],
                            
                            'bachelor_certificate_upload'   => '',
                            'bachelor_marksheet_upload'     => '',
                            'bachelor_transcript_upload'    => '',

                            'masters_university_name'       => $d[51],
                            'masters_school_name'           => $d[52],
                            'masters_school_address'        => '',
                            'masters_passed_year'           => $d[53],
                            'masters_percentage'            => $d[54],
                            'masters_pass_marks'            => $d[55],
                            'masters_major_subject'         => $d[56],
                            'masters_certificate_upload'    => '',
                            'masters_marksheet_upload'      => '',
                            'masters_transcript_upload'     => '',
                        ];
                    }
                }
            unset($data[0]);
            unset($educationDetail[0]);
            TeachersPersonalDetail::insert($data);
            TeachersEducationDetail::insert($educationDetail);
            return redirect('/teachers-personal-list')->with('success', 'Successfully created');
            } else {
                return redirect('/teachers-personal-list')->with('fail', 'file type not supported [$supported_mimes = [xls,xlsx,csv]');
             }
        } else {
            return redirect('/teachers-personal-list')->with('fail', 'please select file to import');
        }
    }
}