<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ConfiguracionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'usuario_id' => Usuario::factory(),
            'modoOscuro' => fake()->randomElement(['Y','N']),
            'datosPrivados' => fake()->randomElement(['Y','N'])
        ];
    }
}
