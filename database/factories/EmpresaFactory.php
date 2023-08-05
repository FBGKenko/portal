<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmpresaFactory extends Factory
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
            'correoEmpresa' => fake()->safeEmail(),
            'telefonoEmpresa' => fake()->phoneNumber(),
            'paginaWeb' => fake()->safeEmailDomain(),
            'mision' => fake()->sentence(),
            'vision' => fake()->sentence()
        ];
    }
}
