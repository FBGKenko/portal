<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\empresa>
 */
class empresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'razonSocial' => fake()->company(),
            'correoEmpresa' => fake()->companyEmail(),
            'telefonoEmpresa' => fake()->phoneNumber(),
            'mision' => fake()->sentence(),
            'vision' => fake()->sentence(),
            'paginaWeb' => fake()->domainName(),
            'giroNegocio' => fake()->word(),
            'descripcion' => fake()->sentence(),
            'direccion' => fake()->sentence()
        ];
    }
}
