<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(2, true);

        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => fake()->sentence(),
            'parent_id' => null, // Por defecto sin padre, se puede personalizar
        ];
    }

    /**
     * Crear una categoría hijo de otra categoría
     */
    public function child(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => \App\Models\Category::factory(),
            ];
        });
    }
}
