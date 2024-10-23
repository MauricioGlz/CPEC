<?php

namespace Database\Factories;

use App\Models\Parents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'father_surname' => fake()->lastName(),
            'mother_surname' => fake()->lastName(),
            'birthday' => fake()->date(),
            'parents_id' => Parents::factory()
        ];
    }
}
