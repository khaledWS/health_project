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
        Schema::create('patient_vitals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('clinic_id')->comment('The Clinic of the Doctor putting the vitals');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id');
            $table->dateTime('datetime');
            $table->string('height', 255);
            $table->string('weight', 255);
            $table->string('pulseRate', 255);
            $table->string('temperature', 255);
            $table->string('bp_systolic', 255);
            $table->string('bloodSugar', 255);
            $table->string('respiratory', 255);
            $table->string('spo_two', 255);
            $table->string('bp_diastolic', 255);
            $table->string('head_circumference', 255);
            $table->string('urine', 255);
            $table->string('bmi', 255);
            $table->enum('weight_status', ['1', '2', '3', '4']);
            $table->string('pain_scale', 255);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();

            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('doctor_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('patient_vitals');
    }
};
