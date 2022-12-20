<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *Usuario: id, nombre(50), apellidos(50), f_nacimiento (date)
     *Publicaciones: id, usuario_id, titulo(50), publicacion(250), fecha(date)
     *
     *Ninguna de las tablas tendrá los campos created_at y updated_at. 
     *La tabla usuarios tendrá el campo deleted_at y usará el soft delete.
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'f_nacimiento' => $this->faker->date(),
        ];
    }
}
