<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherPersonalDetals extends FormRequest
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
            'school_id'                             => 'required|numeric',
            'teachers_name_nep'                     => 'required',
            'teachers_name_eng'                     => 'required',
            'teachers_caste'                        => 'required',
            'teachers_religion'                     => 'required',
            'teacher_enroll_status'                 => 'required',
            'teachers_gender'                       => 'required',
            'teachers_mobno'                        => 'required |numeric',
            'teachers_email'                        => 'required',
            'teachers_province'                     => 'required',
            'teachers_zone'                         => 'required',
            'teachers_localadd'                     => 'required',
            'teachers_birth_place'                  => 'required',
            'teachers_ward'                         => 'required',
            'teachers_tole'                         => 'required',
            'teachers_gf_name'                      => 'required',
            'teachers_birth_place'                  => 'required',
            'teachers_f_name'                       => 'required',
            'teachers_m_name'                       => 'required',
            'teachers_dob_bs'                       => 'required',
            'teachers_dob_ad'                       => 'nullable',
            'teachers_marriage_satatus'             => 'required',
            'teachers_marriage_date'                => 'nullable',
            'teachers_hw_name'                      => 'nullable',
            'teachers_citno'                        => 'required',
            'teachers_cit_jari_date'                => 'required',
            'teachers_cit_jari_district'            => 'required',
            'teachers_panno'                        => 'required',
            'teachers_teacher_licenseno'            => 'required',
            'teachers_teacher_licensestep'          => 'required',
            'teachers_teacher_license_sub'          => 'required',
            'teachers_teacher_licenseno_jari_date'  => 'required',
            'teachers_cit_upload'                   => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
            'teachers_teacher_license_upload'       => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
            'teachers_pan_upload'                   => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
            
        ];
        return $rules;
    }
}
