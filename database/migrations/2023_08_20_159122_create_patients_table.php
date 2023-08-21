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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 255);
            $table->string('lastname', 255)->nullable();
            $table->UnsignedTinyInteger('gender');
            $table->string('address', 400)->nullable();
            $table->date('date_of_birth');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('about', 400)->nullable();
            $table->unsignedInteger('patient_category')->default(1);
            $table->double('height')->nullable();
            $table->double('weight')->nullable();

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('firstname', 'firstname');
            $table->index('lastname', 'lastname');
            $table->index('date_of_birth', 'date_of_birth');

            $table->foreign('patient_category')->references('id')->on('CONST_patient_categories');
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
        Schema::dropIfExists('patients');
    }
};
