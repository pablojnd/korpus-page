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

        // Obtener categorías específicas
        $electronics = \App\Models\Category::where('slug', 'electronicos')->first();
        $implants = \App\Models\Category::where('name', 'like', '%Implantes%')->first();
        $surgical = \App\Models\Category::where('name', 'like', '%Quirúrgicos%')->first();

        // Crear productos específicos de equipos médicos
        $medicalProducts = [
            [
                'name' => 'Sistema de Placa Bloqueada para Húmero',
                'slug' => 'placa-bloqueada-humero',
                'description' => 'Sistema de placas de bloqueo para fracturas de húmero proximal y distal. Diseño anatómico pre-contorneado con orificios de bloqueo angular.',
                'price' => 450000,
                'stock' => 25,
                'atributtes' => [
                    'material' => 'Titanio Ti-6Al-4V',
                    'certificacion' => 'CE/FDA',
                    'esterilizacion' => 'Gamma',
                    'garantia' => '5 años',
                    'origen' => 'Alemania'
                ],
                'category_id' => $implants ? $implants->id : 1,
            ],
            [
                'name' => 'Tornillos Canulados de Titanio',
                'slug' => 'tornillos-canulados-titanio',
                'description' => 'Tornillos canulados de titanio para osteosíntesis. Diseño autorroscante con punta trocar para facilitar la inserción.',
                'price' => 85000,
                'stock' => 150,
                'atributtes' => [
                    'material' => 'Titanio Grado 5',
                    'diametro' => '4.0mm, 6.5mm, 7.3mm',
                    'longitud' => '16-120mm',
                    'certificacion' => 'ISO 13485',
                    'esterilizacion' => 'ETO'
                ],
                'category_id' => $implants ? $implants->id : 1,
            ],
            [
                'name' => 'Mesa Quirúrgica Universal Electrónica',
                'slug' => 'mesa-quirurgica-universal',
                'description' => 'Mesa quirúrgica universal con control electrónico. Movimientos suaves y precisos para posicionamiento del paciente.',
                'price' => 3500000,
                'stock' => 3,
                'atributtes' => [
                    'capacidad' => '250 kg',
                    'control' => 'Electrónico con memoria',
                    'material_superficie' => 'Acero Inoxidable 316L',
                    'certificacion' => 'CE/FDA',
                    'garantia' => '3 años'
                ],
                'category_id' => $surgical ? $surgical->id : 1,
            ],
            [
                'name' => 'Monitor de Signos Vitales Avanzado',
                'slug' => 'monitor-signos-vitales',
                'description' => 'Monitor multiparamétrico para UCI con pantalla táctil de 15". Monitoreo continuo de ECG, presión arterial, SpO2 y temperatura.',
                'price' => 2800000,
                'stock' => 8,
                'atributtes' => [
                    'pantalla' => '15" TFT Táctil',
                    'parametros' => 'ECG, NIBP, SpO2, Temp',
                    'bateria' => '4 horas autonomía',
                    'conectividad' => 'WiFi, Ethernet',
                    'certificacion' => 'CE/FDA'
                ],
                'category_id' => $electronics ? $electronics->id : 1,
            ]
        ];

        // Crear los productos específicos
        foreach ($medicalProducts as $productData) {
            \App\Models\Product::create($productData);
        }

        // Crear productos aleatorios usando factory
        \App\Models\Product::factory(15)->create();

        // Crear algunos productos inactivos
        \App\Models\Product::factory(3)->inactive()->create();
    }
}
