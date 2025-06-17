<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear categorías principales
        $electronics = \App\Models\Category::create([
            'name' => 'Electrónicos',
            'slug' => 'electronicos',
            'description' => 'Productos electrónicos y tecnología',
        ]);

        $clothing = \App\Models\Category::create([
            'name' => 'Ropa',
            'slug' => 'ropa',
            'description' => 'Ropa y accesorios',
        ]);

        $home = \App\Models\Category::create([
            'name' => 'Hogar',
            'slug' => 'hogar',
            'description' => 'Productos para el hogar',
        ]);

        // Crear subcategorías para Electrónicos
        \App\Models\Category::create([
            'name' => 'Smartphones',
            'slug' => 'smartphones',
            'description' => 'Teléfonos inteligentes',
            'parent_id' => $electronics->id,
        ]);

        \App\Models\Category::create([
            'name' => 'Laptops',
            'slug' => 'laptops',
            'description' => 'Computadoras portátiles',
            'parent_id' => $electronics->id,
        ]);

        // Crear subcategorías para Ropa
        \App\Models\Category::create([
            'name' => 'Hombre',
            'slug' => 'ropa-hombre',
            'description' => 'Ropa para hombre',
            'parent_id' => $clothing->id,
        ]);

        \App\Models\Category::create([
            'name' => 'Mujer',
            'slug' => 'ropa-mujer',
            'description' => 'Ropa para mujer',
            'parent_id' => $clothing->id,
        ]);

        // Crear categorías adicionales usando factory
        \App\Models\Category::factory(5)->create();

        // Crear algunas categorías hijas usando factory
        \App\Models\Category::factory(3)->child()->create();
    }
}
