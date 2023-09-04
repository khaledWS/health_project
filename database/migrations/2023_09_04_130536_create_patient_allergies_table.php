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
        Schema::create('patient_allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedMediumInteger('allergen_id');
            $table->unsignedMediumInteger('allergy_id');
            $table->unsignedMediumInteger('severity_id');
            $table->string('reaction', 150);
            $table->unsignedInteger('clinic_id');
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();




            $table->foreign('patient_id')->references('id')->on('patients');
            // $table->foreign('allergen_id')->references('id')->on('allergens');
            // $table->foreign('allergy_id')->references('id')->on('allergies');
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
        Schema::dropIfExists('patient_allergies');
    }
};
