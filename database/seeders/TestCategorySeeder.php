<?php

namespace Database\Seeders;

use App\Models\TestCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::statement("
      INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Clinical Chemistry', 'uploads/labcategory/1640852181_Clinical_Chemistry_Icon.png', '1', '2019-12-03', '2021-12-30 08:16:21');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Hematology', 'uploads/labcategory/1640852195_Hematology_Icon.png', '1', '2019-12-03', '2021-12-30 08:16:35');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Microbiology', 'uploads/labcategory/1640852204_Microbiology_Icon.png', '1', '2019-12-03', '2021-12-30 08:16:44');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Clinical Pathology', 'uploads/labcategory/1640852214_Clinical_Pathology_Icon.png', '1', '2019-12-03', '2021-12-30 08:16:54');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Coagulation', 'uploads/labcategory/1640852231_Coagulation_Icon.png', '1', '2019-12-03', '2021-12-30 08:17:11');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Molecular', 'uploads/labcategory/1640852241_Molecular_Icon.png', '1', '2019-12-03', '2021-12-30 08:17:21');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Cytogenetics', 'uploads/labcategory/1640852250_Cytogenetics_Icon.png', '1', '2019-12-03', '2021-12-30 08:17:30');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Flowcytometry', '', '1', '2019-12-03', '2019-12-03 00:00:00');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Histopathology', 'uploads/labcategory/1640852797_Molecular_Icon.png', '1', '2019-12-03', '2021-12-30 08:26:37');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('X-Ray', '', '2', '2019-12-04', '2020-03-04 11:38:58');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('MRI', 'uploads/labradialogy/1640853284_MRI_Icon.png', '2', '2019-12-04', '2021-12-30 08:34:44');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('CT', 'uploads/labradialogy/1640853346_CT_Icon.png', '2', '2019-12-04', '2021-12-30 08:35:46');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Fluoroscopy', 'uploads/labradialogy/1640853360_Fluoroscopy_Icon.png', '2', '2019-12-04', '2021-12-30 08:36:00');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Ultrasound', 'uploads/labradialogy/1640853460_Ultrasound_Icon.png', '2', '2019-12-04', '2021-12-30 08:37:40');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('BMD', '', '2', '0000-00-00', '0000-00-00 00:00:00');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Mammography', 'uploads/labradialogy/1640853496_Mammography_Icon.png', '2', '0000-00-00', '2021-12-30 08:38:16');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Immunology', 'uploads/labcategory/1640852807_Coagulation_Icon.png', '1', '0000-00-00', '2021-12-30 08:26:47');
INSERT INTO `test_categories` (`title`, `image`, `type`, `created`, `updated`) VALUES ('Serology', '', '1', '0000-00-00', '0000-00-00 00:00:00');

      ")
    }
}
