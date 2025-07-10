<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantidade_total = $this->faker->numberBetween(1, 50);
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'titulo' => $this->faker->sentence(3),
            'sinopse' => $this->faker->paragraph(),
            'imagem' => $this->faker->imageUrl(600, 480, 'book', true),
            'autor' => $this->faker->name(),
            'quantidade_total' => $quantidade_total,
            'quantidade_disponivel' => $this->faker->numberBetween(0, $quantidade_total)
        ];
    }
}
