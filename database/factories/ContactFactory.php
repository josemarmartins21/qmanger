<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
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
            'last_name' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'user_id' => User::all()->random()->id,
            'endereco_id' => Endereco::all()->random()->id,
        ];
    }
}
