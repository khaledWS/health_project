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
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('category_id');
            $table->string('title',100);
            $table->string('test_code',30);
            $table->string('description',250);
            $table->string('info',250);
            $table->string('globalCode',50);
            $table->string('testcode',50);
            $table->unsignedMediumInteger('unit_id');
            $table->unsignedTinyInteger('range_type');
            $table->mediumInteger('min_range');
            $table->mediumInteger('max_range');
            $table->unsignedTinyInteger('split');
            $table->unsignedMediumInteger('machine_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('test_categories');
            $table->foreign('unit_id')->references('id')->on('measuring_units');
            $table->foreign('machine_id')->references('id')->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
