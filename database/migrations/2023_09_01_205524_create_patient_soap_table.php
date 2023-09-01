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
        Schema::create('patient_soap', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('diagnosis_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedInteger('clinic_id');
            $table->string('subjective', 500)->nullable();
            $table->string('objective', 500)->nullable();
            $table->string('assessment', 500)->nullable();
            $table->string('plan', 500)->nullable();
            $table->string('outcome', 500)->nullable();
            $table->string('notes', 500)->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('diagnosis_id')->references('id')->on('diagnosis');
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
        Schema::dropIfExists('patient_soap');
    }
};
