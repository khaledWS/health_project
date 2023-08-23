<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'system_country_id' => 1,
            'facility_type_id' =>2,
            'parent_id' => null,
            'name' => fake()->company(),
            'license_number' => '111',
            'address' => fake()->address(),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
