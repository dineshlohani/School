<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersWorkDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_work_details', function (Blueprint $table) {
            $table->id();
            $table->string('employer_type',255)->nullable();
            $table->string('tempo_enroll_date',255)->nullable();
            $table->string('tempo_file_upload',255)->nullable();
            $table->string('tempo_last_date',255)->nullable();
            $table->string('perma_enroll_date',255)->nullable();
            $table->string('perma_file_upload',255)->nullable();
            $table->string('perma_paper_sub',255)->nullable();
            $table->string('perma_work_start_date',255)->nullable();
            $table->string('perma_work_till_date',255)->nullable();
            $table->string('perma_work_last_date',255)->nullable();
            $table->string('perma_work_last_date_remain',255)->nullable();
            $table->string('perma_taught_school_name',255)->nullable();
            $table->string('perma_taught_school_province',255)->nullable();
            $table->string('perma_taught_school_district',255)->nullable();
            $table->string('perma_taught_school_ward',255)->nullable();
            $table->string('perma_enroll_post',255)->nullable();
            $table->string('perma_enroll_time_period',255)->nullable();
            $table->string('perma_enroll_paper_upload',255)->nullable();
            $table->string('perma_experience_letter_upload',255)->nullable();
            $table->string('training_took_date',255)->nullable();
            $table->string('training_period',255)->nullable();
            $table->string('training_given_org',255)->nullable();
            $table->string('training_related_paper_upload',255)->nullable();
            $table->bigInteger('teachers_id')->unsigned();
            $table->foreign('teachers_id')->references('id')->on('teachers_personal_details');
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
        Schema::dropIfExists('teachers_work_details');
    }
}
