<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([ConstantsSeeder::class]);
        // $this->call([SystemCountriesSeeder::class]);
        // $this->call([PatientSeeder::class]);
        // $this->call([ClinicSeeder::class]);
        $this->call([DoctorSeeder::class]);
        // $this->call([PatientVitalsSeeder::class]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
