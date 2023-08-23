<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'gender' => fake()->numberBetween(1,2),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'country_id' => 141,
            'city_id' => 141,
            'about' => fake()->sentence(),
            'height' => fake()->randomFloat(),
            'weight' => fake()->randomFloat(),
            'created_by' => 1,
            'updated_by' => 1
        ];
    }
}
