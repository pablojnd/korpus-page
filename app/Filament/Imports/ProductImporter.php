<?php

namespace App\Filament\Imports;

use App\Models\Product;
use App\Models\Category;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProductImporter extends Importer
{
    protected static ?string $model = Product::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nombre')
                ->label('Nombre')
                ->requiredMapping()
                ->rules(['required', 'max:255'])
                ->guess(['name', 'producto', 'nombre_producto'])
                ->example('Estetoscopio Cardiology IV')
                ->exampleHeader('Nombre del Producto')
                ->validationAttribute('nombre del producto'),

            ImportColumn::make('descripcion')
                ->label('Descripción')
                ->rules(['nullable', 'string', 'max:1000'])
                ->guess(['description', 'desc', 'detalle'])
                ->example('Estetoscopio de alta calidad para cardiología')
                ->exampleHeader('Descripción'),

            ImportColumn::make('precio')
                ->label('Precio')
                ->requiredMapping()
                ->numeric(decimalPlaces: 2)
                ->rules(['required', 'numeric', 'min:0'])
                ->guess(['price', 'costo', 'valor'])
                ->example('250.00')
                ->exampleHeader('Precio (USD)')
                ->validationAttribute('precio del producto'),

            ImportColumn::make('stock')
                ->label('Stock')
                ->requiredMapping()
                ->integer()
                ->rules(['required', 'integer', 'min:0'])
                ->guess(['cantidad', 'existencia', 'inventario'])
                ->example('15')
                ->exampleHeader('Cantidad en Stock')
                ->validationAttribute('cantidad en stock'),

            ImportColumn::make('categoria')
                ->label('Categoría')
                ->requiredMapping()
                ->rules(['required', 'string', 'max:255'])
                ->guess(['category', 'cat', 'tipo'])
                ->example('Cardiología')
                ->exampleHeader('Categoría')
                ->helperText('Si la categoría no existe, se creará automáticamente')
                ->validationAttribute('categoría'),

            ImportColumn::make('activo')
                ->label('Activo')
                ->boolean()
                ->rules(['boolean'])
                ->guess(['is_active', 'active', 'habilitado', 'visible'])
                ->example('1')
                ->exampleHeader('Activo (1/0)')
                ->helperText('1 para activo, 0 para inactivo'),

            ImportColumn::make('atributos')
                ->label('Atributos')
                ->rules(['nullable', 'json'])
                ->guess(['attributes', 'propiedades', 'caracteristicas'])
                ->example('{"Material":"Acero inoxidable","Color":"Negro","Garantía":"2 años"}')
                ->exampleHeader('Atributos (JSON)')
                ->helperText('Formato JSON: {"propiedad":"valor","otra_propiedad":"otro_valor"}')
                ->sensitive(false),
        ];
    }    public function resolveRecord(): ?Product
    {
        // Obtener o crear la categoría basada en el nombre
        $categoryName = trim($this->data['categoria']);

        // Usar firstOrCreate para obtener o crear la categoría
        $category = Category::firstOrCreate(
            ['name' => $categoryName],
            [
                'slug' => Str::slug($categoryName),
                'description' => "Categoría creada automáticamente durante la importación: {$categoryName}",
            ]
        );

        // Generar slug desde el nombre
        $slug = Str::slug($this->data['nombre']);

        // Asegurar que el slug sea único
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Procesar atributos si existen
        $attributes = null;
        if (!empty($this->data['atributos'])) {
            // Si viene como JSON string, decodificar
            if (is_string($this->data['atributos'])) {
                $attributes = json_decode($this->data['atributos'], true);
            } else {
                $attributes = $this->data['atributos'];
            }
        }

        // Crear o actualizar el producto
        return Product::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => $this->data['nombre'],
                'description' => $this->data['descripcion'] ?? null,
                'price' => $this->data['precio'],
                'stock' => $this->data['stock'],
                'category_id' => $category->id,
                'is_active' => $this->data['activo'] ?? true,
                'atributtes' => $attributes,
            ]
        );
    }

    /**
     * Método helper para importar productos manualmente
     */
    public static function importFromData(array $data): ?Product
    {
        // Obtener o crear la categoría basada en el nombre
        $categoryName = trim($data['categoria']);

        $category = Category::firstOrCreate(
            ['name' => $categoryName],
            [
                'slug' => Str::slug($categoryName),
                'description' => "Categoría creada automáticamente durante la importación: {$categoryName}",
            ]
        );

        // Generar slug desde el nombre
        $slug = Str::slug($data['nombre']);

        // Asegurar que el slug sea único
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Procesar atributos si existen
        $attributes = null;
        if (!empty($data['atributos'])) {
            if (is_string($data['atributos'])) {
                $attributes = json_decode($data['atributos'], true);
            } else {
                $attributes = $data['atributos'];
            }
        }

        // Crear o actualizar el producto
        return Product::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => $data['nombre'],
                'description' => $data['descripcion'] ?? null,
                'price' => $data['precio'],
                'stock' => $data['stock'],
                'category_id' => $category->id,
                'is_active' => $data['activo'] ?? true,
                'atributtes' => $attributes,
            ]
        );
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Se importaron ' . number_format($import->successful_rows) . ' productos correctamente.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' productos fallaron al importar.';
        }

        return $body;
    }

    public function getValidationMessages(): array
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.max' => 'El nombre del producto no puede tener más de 255 caracteres.',
            'precio.required' => 'El precio del producto es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.min' => 'El precio debe ser mayor a 0.',
            'stock.required' => 'La cantidad en stock es obligatoria.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
            'categoria.required' => 'La categoría del producto es obligatoria.',
            'categoria.max' => 'El nombre de la categoría no puede tener más de 255 caracteres.',
            'atributos.json' => 'Los atributos deben estar en formato JSON válido.',
        ];
    }

    protected function beforeValidate(): void
    {
        // Limpiar espacios en blanco del nombre de la categoría
        if (isset($this->data['categoria'])) {
            $this->data['categoria'] = trim($this->data['categoria']);
        }

        // Limpiar espacios en blanco del nombre del producto
        if (isset($this->data['nombre'])) {
            $this->data['nombre'] = trim($this->data['nombre']);
        }
    }

    protected function afterValidate(): void
    {
        // Validar que la categoría no esté vacía después del trim
        if (empty($this->data['categoria'])) {
            throw new \Filament\Actions\Imports\Exceptions\RowImportFailedException('La categoría no puede estar vacía.');
        }
    }

    protected function beforeSave(): void
    {
        // Log de información sobre el producto que se va a guardar
        Log::info('Importando producto: ' . $this->data['nombre']);
    }

    public function getJobQueue(): ?string
    {
        return 'imports';
    }

    public function getJobRetryUntil(): ?\Carbon\CarbonInterface
    {
        return now()->addHour(); // Reintentar por 1 hora en lugar de 24
    }
}
