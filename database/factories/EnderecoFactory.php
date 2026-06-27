<?php

namespace Database\Factories;

use App\Models\Bairro;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'indicacoes' => fake()->text(),
            'street' => fake()->streetAddress(),
            'bairro_id' => Bairro::all()->random()->id,
        ];
    }
}
