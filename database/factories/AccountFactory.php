<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(30),
            'number_account' => fake()->numberBetween(100, 100000),
            'type' => fake()->randomElement(['empresarial', 'residencial']),
            'is_active' => fake()->boolean(),
            'activation_date' => fake()->date(),
            'endereco_id' => Endereco::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
