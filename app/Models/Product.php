<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'price',
        'stock',
        'atributtes',
        'category_id',
        'is_active',
    ];

    protected $casts = [
        'atributtes' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Relación con la categoría
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Obtener el precio formateado
     */
    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Obtener la URL de la imagen principal
     */
    public function getMainImageAttribute(): ?string
    {
        return $this->image;
    }

    /**
     * Obtener los atributos formateados para mostrar
     */
    public function getFormattedAttributesAttribute(): array
    {
        if (!$this->atributtes || !is_array($this->atributtes)) {
            return [];
        }

        $formatted = [];
        foreach ($this->atributtes as $key => $value) {
            $formatted[ucfirst(str_replace('_', ' ', $key))] = $value;
        }

        return $formatted;
    }

    /**
     * Obtener el estado del stock
     */
    public function getStockStatusAttribute(): array
    {
        if ($this->stock <= 0) {
            return [
                'status' => 'out_of_stock',
                'label' => 'Sin Stock',
                'class' => 'bg-red-100 text-red-800'
            ];
        } elseif ($this->stock <= 5) {
            return [
                'status' => 'low_stock',
                'label' => "Últimas {$this->stock} unidades",
                'class' => 'bg-orange-100 text-orange-800'
            ];
        } else {
            return [
                'status' => 'in_stock',
                'label' => "En Stock ({$this->stock} unidades)",
                'class' => 'bg-green-100 text-green-800'
            ];
        }
    }
}
