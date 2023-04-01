<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'correo' => fake()->safeEmail(),
            'telefono' => fake()->phoneNumber(),
            'clave' => password_hash('12345678', PASSWORD_DEFAULT),
            'ultimaConexion' => fake()->dateTime(),
            'nombres' => fake()->name(),
            'apellidos' => fake()->lastName(),
            'tipo' => fake()->randomElement(['Cliente', 'Dueño']),
            'cumpleanios' => fake()->dateTimeInInterval('-40 years', '+15 years'),
            'origen' => fake()->company()
        ];
    }
}
