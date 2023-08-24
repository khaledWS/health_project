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
        Schema::table('CONST_User_Type', function (Blueprint $table) {
            $table->string('model_name',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CONST_User_Type', function (Blueprint $table) {
            $table->dropColumn('model_name');
        });
    }
};
