# Importador de Productos - Documentación

## Características

✅ **Importación automática de categorías**: Si la categoría no existe, se crea automáticamente usando `firstOrCreate()`
✅ **Generación automática de slug**: Si no se proporciona, se genera desde el nombre
✅ **Slugs únicos**: Sistema automático para evitar duplicados
✅ **Soporte para atributos JSON**: Permite importar propiedades adicionales del producto
✅ **Validación de datos**: Validación completa antes de la importación
✅ **Interfaz Filament**: Botón de importación integrado en el panel de administración

## Formato del archivo CSV

El archivo CSV debe tener las siguientes columnas:

| Columna | Tipo | Requerido | Descripción |
|---------|------|-----------|-------------|
| `nombre` | string | ✅ | Nombre del producto |
| `descripcion` | string | ❌ | Descripción del producto |
| `precio` | decimal | ✅ | Precio del producto |
| `stock` | integer | ✅ | Cantidad en stock |
| `categoria` | string | ✅ | Nombre de la categoría (se crea si no existe) |
| `activo` | boolean | ❌ | Estado activo (por defecto: true) |
| `atributos` | json | ❌ | Atributos adicionales en formato JSON |
| `slug` | string | ❌ | Slug personalizado (se genera automáticamente si no se proporciona) |

## Ejemplo de archivo CSV

```csv
nombre,descripcion,precio,stock,categoria,activo,atributos
Estetoscopio Cardiology IV,"Estetoscopio de alta calidad",250.00,15,Cardiología,1,"{""Material"":""Acero inoxidable"",""Color"":""Negro""}"
Tensiómetro Digital,"Tensiómetro automático",89.99,25,Diagnóstico,1,"{""Tipo"":""Digital"",""Pantalla"":""LCD""}"
```

## Uso desde el Panel de Administración

1. Ve a **Productos** en el panel de Filament
2. Haz clic en **"Importar Productos"** (botón verde con ícono de carga)
3. Selecciona tu archivo CSV
4. Mapea las columnas (si es necesario)
5. Confirma la importación

## Uso desde línea de comandos

```bash
# Importar desde un archivo CSV
php artisan products:import ejemplos/productos_ejemplo.csv
```

## Funcionalidades Especiales

### 1. Creación automática de categorías

```php
// Si en el CSV tienes categoria = "Cardiología"
// Y esa categoría no existe, se creará automáticamente con:
$category = Category::firstOrCreate(
    ['name' => 'Cardiología'],
    [
        'slug' => 'cardiologia',
        'description' => 'Categoría creada automáticamente durante la importación: Cardiología',
        'is_active' => true,
    ]
);
```

### 2. Generación de slugs únicos

```php
// Si el producto se llama "Estetoscopio" pero ya existe un slug "estetoscopio"
// Se generará automáticamente: "estetoscopio-1", "estetoscopio-2", etc.
```

### 3. Atributos JSON

```php
// En el CSV puedes incluir atributos como:
// "{""Material"":""Acero inoxidable"",""Color"":""Negro"",""Garantía"":""2 años""}"
// Se convertirán automáticamente a un array asociativo
```

## Validaciones

- **Nombre**: Requerido, máximo 255 caracteres
- **Precio**: Requerido, debe ser numérico y mayor a 0
- **Stock**: Requerido, debe ser entero y mayor o igual a 0
- **Categoría**: Requerida, máximo 255 caracteres
- **Atributos**: Debe ser JSON válido (opcional)

## Mensajes de Confirmación

Al completar la importación, verás:

- ✅ Número de productos importados exitosamente
- ❌ Número de productos que fallaron (si los hay)
- 📝 Detalles de cada error específico

## Archivo de Ejemplo

Se incluye un archivo de ejemplo en: `storage/app/ejemplos/productos_ejemplo.csv`

## Mejores Prácticas

1. **Valida tu CSV** antes de importar usando una herramienta como Excel/LibreOffice
2. **Usa nombres de categorías consistentes** (ej: "Cardiología" en lugar de "cardiologia" o "CARDIOLOGÍA")
3. **Verifica el formato JSON** para los atributos
4. **Haz una copia de seguridad** de tu base de datos antes de importaciones grandes
5. **Prueba con pocos registros** primero para verificar el formato
