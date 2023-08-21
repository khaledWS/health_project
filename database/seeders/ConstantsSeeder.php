<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::unprepared("
        TRUNCATE TABLE CONST_System_Language;
        ");
        DB::unprepared(
            "
            INSERT INTO CONST_System_Language (`language_name_en`,`language_name_ar`, `language_abbr_en`, `language_name_og`) VALUES
            ('English', 'الإنجليزية', 'en', 'English'),
            ('Arabic', 'العربية', 'ar', 'العربية');
            "
        );

        DB::unprepared("
        TRUNCATE TABLE CONST_doctor_specialties;
        ");
        DB::unprepared(
            "
INSERT INTO `CONST_doctor_specialties` (`id`, `name`) VALUES
	(1, 'Anaesthesiologist'),
	(2, 'Cardiologist'),
	(3, 'Dentist'),
	(4, 'Dermatologist');
           "
        );
    }
}
