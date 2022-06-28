<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersPersonalDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('teachers_name_nep',255);
            $table->string('teachers_name_eng',255);
            $table->string('teachers_caste',255)->nullable();
            $table->string('teachers_religion',255)->nullable();
            $table->string('teachers_gender',255);
            $table->string('teachers_mobno',255);
            $table->string('teachers_email',255)->nullable();
            $table->string('teachers_province',255);
            $table->string('teachers_zone',255);
            $table->string('teachers_birth_place',255)->nullable();
            $table->string('teachers_localadd',255)->nullable();
            $table->string('teachers_ward',255)->nullable();
            $table->string('teachers_tole',255)->nullable();
            $table->string('teachers_gf_name',255)->nullable();
            $table->string('teachers_f_name',255)->nullable();
            $table->string('teachers_m_name',255)->nullable();
            $table->string('teachers_dob_bs',255)->nullable();
            $table->string('teachers_dob_ad',255)->nullable();
            $table->string('teachers_marriage_satatus',255)->nullable();
            $table->string('teachers_marriage_date',255)->nullable();
            $table->string('teachers_hw_name',255)->nullable();
            $table->string('teachers_citno',255)->nullable();
            $table->string('teachers_cit_jari_date',255)->nullable();
            $table->string('teachers_cit_jari_district',255)->nullable();
            $table->string('teachers_cit_upload',255)->nullable();
            $table->string('teachers_panno',255)->nullable();
            $table->string('teachers_pan_upload',255)->nullable();
            $table->string('teachers_teacher_licenseno',255)->nullable();
            $table->string('teachers_teacher_licensestep',255)->nullable();
            $table->string('teachers_teacher_license_sub',255)->nullable();
            $table->string('teachers_teacher_licenseno_jari_date',255)->nullable();
            $table->string('teachers_teacher_license_upload',255)->nullable();
            $table->bigInteger('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('school_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers_personal_details');
    }
}
