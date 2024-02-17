<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\usuario>
 */
class usuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "correo" => fake()->freeEmail(),
            "telefono" => fake()->phoneNumber(),
            "clave" => Hash::make("123"),
            "ultimaConexion" => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            "nombres" => fake()->firstName(),
            "apellidos" => fake()->lastName(),
            "cumpleanios" => fake()->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            "origen" => 'Aprovado por ingenia'
        ];
    }
}
