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
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('system_country_id')->comment('the country of the clinic');
            $table->UnsignedInteger('facility_type_id')->comment('the facility_type, belongs to a hospital or a school or private');
            $table->UnsignedInteger('parent_id')->nullable()->comment('the parent if exists');
            $table->string('name');
            $table->string('license_number')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->UnsignedTinyInteger('home_service_status')->default(1)->comment('if they offer home services');
            $table->UnsignedTinyInteger('active_status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();


            // $table->foreign('system_country_id')->references('id')->on('system_countries');
            $table->foreign('facility_type_id')->references('id')->on('CONST_facility_types');
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
        Schema::dropIfExists('clinics');
    }
};
