<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersWorkDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'teachers_id',
        'employer_type',
        'tempo_enroll_date',
        'tempo_file_upload',
        'tempo_last_date',
        'perma_enroll_date',
        'perma_file_upload',
        'perma_paper_sub',
        'perma_work_start_date',
        'perma_work_till_date',
        'perma_work_last_date',
        'perma_work_last_date_remain',
        'perma_taught_school_name',
        'perma_taught_school_province',
        'perma_taught_school_district',
        'perma_taught_school_ward',
        'perma_enroll_post',
        'perma_enroll_time_period',
        'perma_enroll_paper_upload',
        'perma_experience_letter_upload',
        'training_took_date',
        'training_period',
        'training_given_org',
        'training_related_paper_upload',
    ];
}
