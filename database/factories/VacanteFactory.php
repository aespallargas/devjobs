<?php

namespace Database\Factories;

use App\Models\Salario;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacante>
 */
class VacanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->jobTitle(),
            'salario_id' => Salario::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id,
            'empresa' => $this->faker->company,
            'ultimo_dia' => $this->faker->dateTimeThisMonth(),
            'descripcion' => $this->faker->paragraph(3),
            'imagen' => $this->faker->imageUrl(),
            'user_id' => rand(2,3)
        ];
    }
}
