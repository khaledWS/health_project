<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement("
        // INSERT INTO `labtest` (`category_id`, `title`, `test_code`, `min_range`, `max_range`, `unit`, `description`, `info`, `created_at`, `updated_at`, `globalCode`, `refId`, `machine_id`, `machine_name`, `test_code`, `split`) VALUES 
        //                       (1, 'Blood Gas', '82803-0', '', '', '', '', 'Blood Gas', ', '2023-05-16 11:20:14', '0000-00-00 00:00:00', NULL, NULL, 4, 'Seamaty', '', 0);
        // INSERT INTO `labtest` (`category_id`, `title`, `test_code`, `min_range`, `max_range`, `unit`, `description`, `info`, `created_at`, `updated_at`, `globalCode`, `refId`, `machine_id`, `machine_name`, `test_code`, `split`) VALUES 
        //                       (1, 'Electrolyte-Blood Gas', '82803-10', '', '', '', '', 'Electrolyte-Blood Gas',  '2023-05-16 11:23:02', '0000-00-00 00:00:00', NULL, NULL, 4, 'Seamaty', '', 0);
        // INSERT INTO `labtest` (`category_id`, `title`, `test_code`, `min_range`, `max_range`, `unit`, `description`, `info`, `created_at`, `updated_at`, `globalCode`, `refId`, `machine_id`, `machine_name`, `test_code`, `split`) VALUES 
        //                       (1, 'Electrolyte', '303754', '', '', '', '', 'Electrolyte Panel\r\n\r\nWhat is an electrolyte panel?\r\nElectrolytes are electrically charged minerals that help control the amount of fluids and the balance of acids and bases in your body. They also help control muscle and nerve activity, heart rhythm, and other important functions. An electrolyte panel, also known as a serum electrolyte test, is a blood test that measures levels of the body\'s main electrolytes:\r\n\r\nSodium, which helps control the amount of fluid in the body. It also helps your nerves and muscles work properly.\r\nChloride, which also helps control the amount of fluid in the body. In addition, it helps maintain healthy blood volume and blood pressure.\r\nPotassium, which helps your heart and muscles work properly.\r\nBicarbonate, which helps maintain the body\'s acid and base balance. It also plays an important role in moving carbon dioxide through the bloodstream.',  '2023-05-15 07:54:55', '2023-05-16 11:11:03', NULL, NULL, 4, 'Samaty', '', 0);
        // ");
    }
}
