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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('اسم الملف الاصلي');
            $table->string('size')->comment('الحجم');;
            $table->string('filename')->comment('اسم الملف بعد التغير');;
            $table->string('path')->comment('المسار');;
            $table->string('full_original_path',500)->comment('رابط الصورة كامل الاصلية');;
            $table->string('full_large_path',500);
            $table->string('full_medium_path',500);
            $table->string('full_small_path',500);
            $table->string('mime_type',500);
            $table->string('file_type',500);
            $table->UnsignedBigInteger('relation_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('deleted_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
