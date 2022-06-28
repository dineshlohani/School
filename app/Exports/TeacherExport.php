<?php

namespace App\Exports;

use App\Models\TeachersPersonalDetail;
// use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TeacherExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return TeachersPersonalDetail::all();
    // }
    public function view(): View
    {
        
        return view('exports.list', [
            'data' => TeachersPersonalDetail::with('school')->get(),
        ]);
    }
}
