<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherWorKDetails extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'teachers_id'                       => 'required|numeric',
            'employer_type'                     => 'nullable',
            'tempo_enroll_date'                 => 'nullable',
            'tempo_file_upload'                 => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
            'tempo_last_date'                   => 'nullable',
            'perma_enroll_date'                 => 'required',
            'perma_file_upload'                 => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
            'perma_paper_sub'                   => 'required',
            'perma_work_start_date'             => 'required',
            'perma_work_till_date'              => 'required',
            'perma_work_last_date'              => 'required',
            'perma_work_last_date_remain'       => 'required',
            'perma_taught_school_name'          => 'required',
            'perma_taught_school_province'      => 'required',
            'perma_taught_school_district'      => 'required',
            'perma_taught_school_ward'          => 'required',
            'perma_enroll_post'                 => 'required',
            'perma_enroll_time_period'          => 'required',
            'perma_enroll_paper_upload'         => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
            'perma_experience_letter_upload'    => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
            'training_took_date'                => 'nullable',
            'training_period'                   => 'nullable',
            'training_given_org'                => 'nullable',
        ];
        return $rules;
    }
}
