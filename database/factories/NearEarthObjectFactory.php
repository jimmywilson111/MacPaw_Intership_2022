<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class NearEarthObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'referenced' => fake()->numberBetween(10000, 90000),
            'name' => fake()->numberBetween(1000, 9000) . ' ' . fake()->word(),
            'speed' => fake()->numberBetween(1000, 9999).'.'.fake()->numberBetween(9999, 1000),
            'is_hazardous' => fake()->boolean(60),
            'date' => fake()->date()
        ];
    }
}
