<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\Patient;
use App\Models\PatientVitals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientVitalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientVitals::truncate();
        $patients = Patient::all();
        foreach ($patients as $key => $value) {
            PatientVitals::create([
                "clinic_id" =>  Clinic::inRandomOrder()->first()->id,
                "doctor_id" =>1,
                "patient_id" => $value->id,
                "datetime" => fake()->dateTime(),
                "height" => 1,
                "weight" => 1,
                "pulseRate" => 1,
                "temperature" => 1,
                "bp_systolic" => 1,
                "bloodSugar" => 1,
                "respiratory" => 1,
                "spo_two" => 1,
                "bp_diastolic" => 1,
                "head_circumference" => 1,
                "urine" => 1,
                "bmi" => 1,
                "weight_status" => fake()->numberBetween(1, 4),
                "pain_scale" => 1,
                "created_by" => 1,
                "updated_by" => 1,
                "deleted_by" => 1
            ]);
        }
    }
}
