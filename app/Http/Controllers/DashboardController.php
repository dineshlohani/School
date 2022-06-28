<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolDetails;
use App\Models\SchoolType;
use App\Models\TeachersPersonalDetail;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stypename = SchoolType::get();
        foreach($stypename as $key => $stn):
        $countaspertype = SchoolDetails::where('school_type','{{ $stn->school_type}}');
        endforeach;
        $count          = SchoolDetails::count();
        $tot_school     = SchoolDetails::get();
        $tot_steachers   = TeachersPersonalDetail::where('teacher_enroll_status','1')->count();
        $tot_teachers   = TeachersPersonalDetail::count();
        $sthai_teacher  = TeachersPersonalDetail::where('teacher_enroll_status','1')->get();
        $asthai_teacher = TeachersPersonalDetail::where('teacher_enroll_status','2')->get();
        $tot_ateachers    = TeachersPersonalDetail::where('teacher_enroll_status','2')->count();
        return view('pages.dashboard', compact('count','tot_steachers','tot_ateachers','tot_teachers','sthai_teacher','asthai_teacher','tot_school','stypename'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
