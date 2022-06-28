<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersEducationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'teachers_id',
        'slc_passed_year',
        'slc_school_name',
        'slc_percent',
        'slc_pass_marks',
        'slc_major_subject',
        'slc_certificate_upload',
        'slc_marksheet_upload',
        'plustwo_passed_year',
        'plustwo_school_name',
        'plustwo_school_address',
        'plustwo_faculty',
        'plustwo_percentage',
        'plustwo_pass_marks',
        'plustwo_certificate_upload',
        'plustwo_marksheet_upload',
        'plustwo_transcript_upload',
        'bachelor_passed_year',
        'bachelor_school_name',
        'bachelor_school_address',
        'bachelor_uuniversity_name',
        'bachelor_faculty',
        'bachelor_percentage',
        'bachelor_pass_marks',
        'bachelor_major_subject',
        'bachelor_certificate_upload',
        'bachelor_marksheet_upload',
        'bachelor_transcript_upload',
        'bed_passed_year',
        'bed_school_name',
        'bed_school_address',
        'bed_university_name',
        'bed_faculty',
        'bed_percentage',
        'bed_pass_marks',
        'bed_major_subject',
        'bed_certificate_upload',
        'bed_marksheet_upload',
        'bed_transcript_upload',
        'masters_passed_year',
        'masters_school_name',
        'masters_school_address',
        'masters_university_name',
        'masters_percentage',
        'masters_pass_marks',
        'masters_major_subject',
        'masters_certificate_upload',
        'masters_marksheet_upload',
        'masters_transcript_upload',
        'others_certificate_upload',
    ];

    public function teacherDetails() {
        return $this->belongsTo(TeachersPersonalDetail::class);
    }
}
