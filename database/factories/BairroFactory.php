<?php

namespace Database\Factories;

use App\Models\Bairro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bairro>
 */
class BairroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->streetName()
        ];
    }
}
