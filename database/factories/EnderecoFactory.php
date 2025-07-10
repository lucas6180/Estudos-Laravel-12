<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
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
            'rua' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'cep' => $this->faker->numerify("#########"),
            'complemento' => $this->faker->secondaryAddress(),
            'referencia' => $this->faker->sentence(3),
            'cidade' => $this->faker->city()
        ];
    }
}
