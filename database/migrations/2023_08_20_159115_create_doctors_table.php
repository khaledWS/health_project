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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 255);
            $table->string('lastname', 255)->nullable();
            $table->UnsignedTinyInteger('gender');
            $table->string('address', 400)->nullable();
            $table->date('date_of_birth');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('about', 400)->nullable();
            $table->unsignedBigInteger('speciality_id')->nullable();
            $table->string('qualifications', 400)->nullable();
            $table->string('procedure', 400)->nullable();
            $table->string('treatment', 400)->nullable();
            $table->string('board', 400)->nullable();
            $table->integer('years_of_experience');
            $table->boolean('has_insurance')->default(false);

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
