<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_care_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedInteger('clinic_id');
            $table->unsignedInteger('parent_facility_type')->nullable();
            $table->unsignedInteger('parent_facility_id')->nullable();
            $table->string('assessment', 500)->nullable();
            $table->string('nursing_diagnosis', 500)->nullable();
            $table->string('goals_outcomes', 500)->nullable();
            $table->string('nursing_interventions', 500)->nullable();
            $table->string('rationale', 500)->nullable();
            $table->string('evaluations', 500)->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('clinic_id')->references('id')->on('clinics');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('diagnosis', function (Blueprint $table) {
        //     $table->dropForeign('created_by');
        //     $table->dropForeign('updated_by');
        //     $table->dropForeign('deleted_by');
        //     $table->dropForeign('patient_id');
        //     $table->dropForeign('doctor_id');
        //     $table->dropForeign('clinic_id');
        // });
        Schema::dropIfExists('patient_care_plans');
    }
};
