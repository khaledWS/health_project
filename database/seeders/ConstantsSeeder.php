<?php

namespace Database\Seeders;

use App\Models\CONST_Facility_type;
use App\Models\CONST_Patient_Category;
use App\Models\CONST_User_Type;
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

        CONST_User_Type::truncate();
        (new CONST_User_Type())->setTranslation('name','en','Patient')->setTranslation('name','ar','مريض')->save();
        (new CONST_User_Type())->setTranslation('name','en','Doctor')->setTranslation('name','ar','طبيب')->save();
        (new CONST_User_Type())->setTranslation('name','en','Lab Technician')->setTranslation('name','ar','اخصائي مختبر')->save();
        (new CONST_User_Type())->setTranslation('name','en','Pharmacist')->setTranslation('name','ar','صيدلي')->save();
        (new CONST_User_Type())->setTranslation('name','en','Facility Administrator')->setTranslation('name','ar','مدير مؤسسة')->save();
        (new CONST_User_Type())->setTranslation('name','en','Country Administrator')->setTranslation('name','ar','مدير دولة')->save();
        (new CONST_User_Type())->setTranslation('name','en','System Administrator')->setTranslation('name','ar','مدير نظام')->save();

        CONST_Patient_Category::truncate();
        (new CONST_Patient_Category())->setTranslation('name','en','normal')->setTranslation('name','ar','مريض')->save();
        (new CONST_Patient_Category())->setTranslation('name','en','Student')->setTranslation('name','ar','طالب')->save();
        (new CONST_Patient_Category())->setTranslation('name','en','Parent')->setTranslation('name','ar','ولي أمر')->save();

        CONST_Facility_type::truncate();
        (new CONST_Facility_type())->setTranslation('name','en','Hospital')->setTranslation('name','ar','مشفى')->save();
        (new CONST_Facility_type())->setTranslation('name','en','Clinic')->setTranslation('name','ar','عيادة')->save();
    }
}
