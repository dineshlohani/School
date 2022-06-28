<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersPersonalDetail extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'teacher_enroll_status',
        'teachers_name_nep',
        'teachers_name_eng',
        'teachers_caste',
        'teachers_religion',
        'teachers_gender',
        'teachers_mobno',
        'teachers_email',
        'teachers_province',
        'teachers_zone',
        'teachers_localadd',
        'teachers_ward',
        'teachers_tole',
        'teachers_gf_name',
        'teachers_birth_place',
        'teachers_f_name',
        'teachers_m_name',
        'teachers_dob_bs',
        'teachers_dob_ad',
        'teachers_marriage_satatus',
        'teachers_marriage_date',
        'teachers_hw_name',
        'teachers_citno',
        'teachers_cit_jari_date',
        'teachers_cit_jari_district',
        'teachers_cit_upload',
        'teachers_panno',
        'teachers_pan_upload',
        'teachers_teacher_licenseno',
        'teachers_teacher_licensestep',
        'teachers_teacher_license_sub',
        'teachers_teacher_licenseno_jari_date',
        'teachers_teacher_license_upload'
    ];

    public function school()
    {
        return $this->belongsTo(SchoolDetails::class);
    }

    public function casteName()
    {
        return $this->belongsTo(Caste::class);
    }

    public function religionName()
    {
        return $this->belongsTo(Religion::class);
    }

    public function educationDetails() {
        return $this->hasMany(TeachersEducationDetail::class,'teachers_id');
    }

    public function workDetails() {
        return $this->hasMany(TeachersWorkDetails::class,'teachers_id');
    }
}
