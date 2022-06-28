<?php

namespace App\Exports;

use App\Models\TeachersPersonalDetail;
// use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExportTeachersDetailsBySearch implements FromView
{
   
    private $school;
    private $status;
    private $sname;
    private $lno;
    /**
        * ExportUsers constructor.
        * @param Collection $plannings
    */
    public function __construct($school,$status,$sname,$lno ) {
        $this->school = $school;
        $this->status = $status;
        $this->sname = $sname;
        $this->lno = $lno;
    }

    public function view(): View
    {
        $s = $this->school;
        $st = $this->status;
        $sn = $this->sname;
        $ln = $this->lno;
        return view('exports.listbysearch', [
            'data' => TeachersPersonalDetail::with('school')->
                    when(!empty($s) , function ($query) use($s){
                        return $query->where('school_id',$s);
                    })->when(!empty($st) , function ($query) use($st){
                        return $query->where('teacher_enroll_status',$st);
                    })->when(!empty($sn) , function ($query) use($sn){
                        return $query->where('teachers_name_nep',$sn);
                    })->when(!empty($ln) , function ($query) use($ln){
                        return $query->where('teachers_teacher_licenseno',$ln);
                    })->get(),
        ]);
    }
}
