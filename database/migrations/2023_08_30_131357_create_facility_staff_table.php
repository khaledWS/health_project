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
        Schema::create('facility_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('staff_type_id');
            $table->unsignedInteger('facility_type_id');
            $table->unsignedInteger('facility_id')->nullable();
            $table->string('firstname', 255);
            $table->string('lastname', 255)->nullable();
            $table->UnsignedTinyInteger('gender');
            $table->string('address', 400)->nullable();
            $table->date('date_of_birth');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('staff_type_id')->references('id')->on('const_facility_staff_types');
            $table->foreign('facility_type_id')->references('id')->on('const_facility_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_staff');
    }
};
