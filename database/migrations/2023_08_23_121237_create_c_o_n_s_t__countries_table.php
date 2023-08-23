<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE TABLE `const_countries` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `CountryCode` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `name` VARCHAR(256) NOT NULL COLLATE 'utf8_general_ci',
            `NationalExpatriate` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `FourGroups` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `SixGroups` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `NineGroups` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `FourteenGroups` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `UN` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `IsDeleted` INT(11) NULL DEFAULT '0',
            `R4AnswerID` INT(11) NULL DEFAULT NULL,
            `iso` VARCHAR(10) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            `phonecode` INT(11) NULL DEFAULT NULL,
            `TimeZoneName` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
            PRIMARY KEY (`id`) USING BTREE,
            INDEX `NewIndex1` (`name`(255)) USING BTREE
        )
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('const_countries');
    }
};
