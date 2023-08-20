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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name']);
            $table->string('username', 255)->unique()->after('email');
            $table->string('national_id', 100)->nullable()->after('username');
            $table->tinyInteger('notifications_status')->default(0)->after('national_id');
            $table->boolean('is_verified')->default(0)->after('notifications_status');
            $table->string('phone', 100)->nullable()->after('is_verified');
            $table->string('hash', 255)->nullable()->after('phone');
            $table->integer('user_type_id')->unsigned()->after('hash');
            $table->bigInteger('user_type_reference_id')->unsigned()->after('user_type_id');
            $table->integer('device_type')->unsigned()->nullable()->after('user_type_reference_id');
            $table->tinyInteger('account_status')->nullable()->after('device_type');
            $table->string('NotificationTocken', 300)->nullable()->after('account_status');
            $table->string('device_id', 300)->nullable()->after('NotificationTocken');
            $table->bigInteger('created_by')->unsigned()->nullable()->after('device_id');
            $table->bigInteger('updated_by')->unsigned()->nullable()->after('created_by');
            $table->bigInteger('deleted_by')->unsigned()->nullable()->after('updated_by');
            $table->softDeletes();



            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');


            $table->index('username', 'idx_users_username');
            $table->index('email', 'idx_users_email');
            $table->index('national_id', 'idx_users_national_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropForeign(['user_type_id']);
            // $table->dropForeign(['user_type_reference_id']);
            // $table->dropForeign(['device_type']);

            $table->dropIndex('idx_users_username');
            $table->dropIndex('idx_users_email');
            $table->dropIndex('idx_users_national_id');

            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);

            // Drop the columns
            $table->dropColumn([
                 'username', 'national_id',  'notifications_status', 'is_verified',
                'phone', 'hash', 'user_type_id', 'user_type_reference_id', 'device_type', 'account_status',
                'NotificationTocken', 'device_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'
            ]);
        });
    }
};
