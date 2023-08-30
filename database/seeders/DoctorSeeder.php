<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\FacilityStaff;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Password;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Doctor::truncate();
        // Doctor::factory(3)->create();
        $doctor = Doctor::updateOrCreate(
            ['lastname' => 'Doctor'],
            [
            'firstName' => "Test",
            'lastname' => "Doctor",
            'gender' => fake()->numberBetween(1, 2),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'country_id' => 141,
            'city_id' => 141,
            'about' => fake()->sentence(),
            'years_of_experience' => fake()->numberBetween(1, 20),
            'has_insurance' => 0,
            'about' => fake()->sentence(),
            'created_by' => 1,
            'updated_by' => 1,
            'speciality_id' => 1
        ]);

        User::updateOrCreate(
            ['email' => 'doctor@test.com'],
            [
            'email' => 'doctor@test.com',
            'username' => 'Test Doctor',
            'user_type_id' =>2 , 
            'user_type_reference_id' => $doctor->id,
            'password' => md5(123),
        ]);
       $nurse =  FacilityStaff::updateOrCreate(
        ['lastname' => 'Nurse'],
        [
            'firstName' => "Test",
            'lastname' => "Nurse",
            'gender' => fake()->numberBetween(1, 2),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'country_id' => 141,
            'city_id' => 141,
            'created_by' => 1,
            'updated_by' => 1,
            "staff_type_id" => 1,
            "facility_type_id" => 1,
        ]);

        User::updateOrCreate(
            ['email' => 'nurse@test.com'],
            [
            'email' => 'nurse@test.com',
            'username' => 'Test Nursee',
            'user_type_id' =>8 , 
            'user_type_reference_id' => $nurse->id,
            'password' => md5(123),
        ]);

        
        
       $recep =  FacilityStaff::updateOrCreate(
        ['lastname' => 'Reception'],
        [
            'firstName' => "Test",
            'lastname' => "Reception",
            'gender' => fake()->numberBetween(1, 2),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'country_id' => 141,
            'city_id' => 141,
            'created_by' => 1,
            'updated_by' => 1,
            "staff_type_id" => 2,
            "facility_type_id" => 1,
        ]);

        User::updateOrCreate(
            ['email' => 'reception@test.com'],
            [
            'email' => 'reception@test.com',
            'username' => 'Test Reception',
            'user_type_id' =>8 , 
            'user_type_reference_id' => $recep->id,
            'password' => md5(123),
        ]);
    }
}
