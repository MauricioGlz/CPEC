<?php

namespace Database\Factories;

use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parents>
 */
class ParentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_name' => fake()->firstNameMale() . ' ' . fake()->lastName(),
            'mother_name' => fake()->firstNameFemale() . ' ' . fake()->lastName()
        ];
    }
}
