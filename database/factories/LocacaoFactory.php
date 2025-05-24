<?php

namespace Database\Factories;

use App\Models\Bungalow;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locacao>
 */
class LocacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataInicio = $this->faker->dateTimeBetween('+1 days', '+1 month');
        $dias = rand(1,20);
        $dataFim = (clone $dataInicio)->modify("+{$dias} days");

        $bungalow = Bungalow::inRandomOrder()->first();

        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? 1,
            'bem_locavel_id' => $bungalow?->id ?? 1,
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'preco_total' => $bungalow ? $bungalow->preco_diario * $dias : 0,
            'status' => $this->faker->randomElement(['reservado', 'cancelado']),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
