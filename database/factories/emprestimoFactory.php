<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\emprestimo>
 */
class emprestimoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dt_emprestimo = $this->faker->dateTimeBetween('-1 month', 'now');
        $dt_devolucao = $this->faker->dateTimeBetween($dt_emprestimo, '+1 month');
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'dt_emprestimo' => $dt_emprestimo,
            'dt_devolucao' => $dt_devolucao,
            'multa_atraso' => $this->faker->randomFloat(2, 0, 10000)
        ];
    }
}
