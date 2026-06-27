<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(),
            'price' => fake()->numberBetween(10000, 25000),
            'description' => fake()->text(),
            'velocity_download' => fake()->numberBetween(2, 15),
            'instalation_tax' => fake()->numberBetween(50000, 60000),
            'user_id' => User::all()->random()->id,
        ];
    }
}
