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

        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(640, 480, 'products', true),
            'price' => fake()->randomFloat(2, 10, 1000), // Precio entre 10 y 1000
            'stock' => fake()->numberBetween(0, 100), // Stock entre 0 y 100
            'atributtes' => json_encode([
                'color' => fake()->colorName(),
                'size' => fake()->randomElement(['S', 'M', 'L', 'XL']),
            ]),
            'category_id' => \App\Models\Category::factory(),
            'is_active' => fake()->boolean(80), // 80% probabilidad de estar activo
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
