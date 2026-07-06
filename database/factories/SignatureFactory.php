<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Plan;
use App\Models\Signature;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Signature>
 */
class SignatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $planId = Plan::all()->random()->id;
        $planName = Plan::find($planId);
        return [
            'price' => Plan::all()->random()->price,
            'start_date' => fake()->date(),
            'end_date' => fake()->date('Y-m-d', '2027-06-12'),
            'status' => fake()->boolean(80),
            'discount' => fake()->numberBetween(5000, 10000),
            'account_id' => Account::all()->random()->id,
            'plan_id' => $planId,
            'plan_name' => $planName->name,
            'user_id' => User::all()->random()->id,
        ];
    }
}
