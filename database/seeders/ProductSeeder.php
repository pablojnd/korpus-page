<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurarse de que existan categorías
        if (\App\Models\Category::count() == 0) {
            $this->call(CategorySeeder::class);
        }

        // Obtener algunas categorías existentes
        $categories = \App\Models\Category::take(5)->get();

        // Crear productos específicos
        foreach ($categories as $category) {
            \App\Models\Product::create([
                'name' => 'Producto Premium ' . $category->name,
                'slug' => 'producto-premium-' . $category->slug,
                'image' => 'https://via.placeholder.com/150',
                'price' => rand(100, 1000),
                'stock' => rand(10, 100),
                'atributtes' => json_encode(['color' => 'red', 'size' => 'M']),
                'description' => 'Un producto premium de la categoría ' . $category->name,
                'category_id' => $category->id,
                'is_active' => true,
            ]);
        }

        // Crear productos aleatorios usando factory
        \App\Models\Product::factory(20)->create();

        // Crear algunos productos inactivos
        \App\Models\Product::factory(5)->inactive()->create();
    }
}
