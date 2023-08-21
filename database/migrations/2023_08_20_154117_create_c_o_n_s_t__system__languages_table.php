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
        Schema::create('CONST_System_Language', function (Blueprint $table) {
            $table->id();
            $table->string('language_name_en', 100);
            $table->string('language_name_ar', 100);
            $table->string('language_name_og', 100);
            $table->string('language_abbr_en', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CONST_System_Language');
    }
};
