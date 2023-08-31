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
    $categoriesData = [
      ['title' => 'Clinical Chemistry', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:16:21'],
      ['title' => 'Hematology', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:16:35'],
      ['title' => 'Microbiology', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:16:44'],
      ['title' => 'Clinical Pathology', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:16:54'],
      ['title' => 'Coagulation', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:17:11'],
      ['title' => 'Molecular', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:17:21'],
      ['title' => 'Cytogenetics', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:17:30'],
      ['title' => 'Flowcytometry', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 00:00:00'],
      ['title' => 'Histopathology', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:26:37'],
      ['title' => 'X-Ray', 'type' => '2', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2020-03-04 11:38:58'],
      ['title' => 'MRI', 'type' => '2', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:34:44'],
      ['title' => 'CT', 'type' => '2', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:35:46'],
      ['title' => 'Fluoroscopy', 'type' => '2', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:36:00'],
      ['title' => 'Ultrasound', 'type' => '2', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:37:40'],
      ['title' => 'BMD', 'type' => '2', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 00:00:00'],
      ['title' => 'Mammography', 'type' => '2', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:38:16'],
      ['title' => 'Immunology', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 08:26:47'],
      ['title' => 'Serology', 'type' => '1', 'created_at' => '2021-12-30 08:16:21', 'updated_at' => '2021-12-30 00:00:00'],
  ];
  

    foreach ($categoriesData as $categoryData) {
      TestCategory::updateOrCreate(
        ['title' => $categoryData['title']],
        [
          'type' => $categoryData['type'],
          'created_by' => 1,
          'updated_by' => 1,
          'created_at' => $categoryData['created_at'],
          'updated_at' => $categoryData['updated_at'],
        ]
      );
    }
  }
}
