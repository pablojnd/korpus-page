<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(3, true);

        // Generar atributos médicos apropiados
        $medicalAttributes = [
            'material' => fake()->randomElement(['Titanio', 'Acero Inoxidable', 'Polímero Biocompatible', 'Cerámica']),
            'certificacion' => fake()->randomElement(['CE', 'FDA', 'ISO 13485', 'ANMAT']),
            'esterilizacion' => fake()->randomElement(['Gamma', 'ETO', 'Autoclave', 'Plasma']),
            'origen' => fake()->randomElement(['Alemania', 'Estados Unidos', 'Suiza', 'Francia']),
            'garantia' => fake()->randomElement(['2 años', '3 años', '5 años', 'Lifetime']),
        ];

        // Seleccionar aleatoriamente 3-4 atributos
        $selectedAttributes = fake()->randomElements($medicalAttributes, fake()->numberBetween(3, 4), false);

        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => fake()->paragraph(),
            'image' => null, // Usaremos placeholder por defecto
            'price' => fake()->randomFloat(2, 50000, 2000000), // Precios más realistas para equipos médicos
            'stock' => fake()->numberBetween(0, 50), // Stock entre 0 y 50
            'atributtes' => $selectedAttributes, // Laravel auto-convertirá a JSON
            'category_id' => \App\Models\Category::factory(),
            'is_active' => fake()->boolean(85), // 85% probabilidad de estar activo
        ];
    }

    /**
     * Crear un producto inactivo
     */
    public function inactive(): static
    {
        return $this->state([
            'is_active' => false,
        ]);
    }
}
