<?php

namespace Database\Seeders;

use App\Models\SystemCountries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemCountries::Truncate();
        SystemCountries::create([
            'country_id' => 141,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
