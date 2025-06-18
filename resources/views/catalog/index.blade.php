@extends('layouts.app')

@section('title', 'Catálogo de Productos - Korpus')

@section('content')
    <!-- Header Section -->
    <section
        class="relative text-white py-16 overflow-hidden bg-[url('/images/product-up.webp')] bg-cover bg-center bg-no-repeat">
        <!-- Dark overlay for better text readability -->
        <div class="inset-0 bg-black bg-opacity-50"></div>

        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Catálogo de Productos</h1>
                <p class="text-xl text-gray-100 max-w-3xl mx-auto">
                    Descubre nuestra amplia gama de equipos médicos de alta calidad para centros de salud
                </p>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Filters Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Filtros</h3>

                        <form method="GET" action="{{ route('catalog.index') }}" id="filterForm">
                            <!-- Search -->
                            <div class="mb-6">
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                                <input type="text" id="search" name="search" value="{{ request('search') }}"
                                    placeholder="Buscar productos..."
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- Categories -->
                            <div class="mb-6">
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
                                <select name="category" id="category"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Todas las categorías</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}"
                                                {{ request('category') == $child->id ? 'selected' : '' }}>
                                                &nbsp;&nbsp;&nbsp;{{ $child->name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sort -->
                            <div class="mb-6">
                                <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">Ordenar
                                    por</label>
                                <select name="sort" id="sort"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nombre</option>
                                    <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Precio
                                    </option>
                                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Más
                                        recientes</option>
                                </select>
                            </div>

                            <input type="hidden" name="direction" value="{{ request('direction', 'asc') }}">

                            <!-- Filter Buttons -->
                            <div class="space-y-3">
                                <button type="submit"
                                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                                    Aplicar Filtros
                                </button>
                                <a href="{{ route('catalog.index') }}"
                                    class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors text-center block">
                                    Limpiar Filtros
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:col-span-3">
                    <!-- Results Info -->
                    <div class="flex justify-between items-center mb-6">
                        <p class="text-gray-600">
                            Mostrando {{ $products->firstItem() }} - {{ $products->lastItem() }}
                            de {{ $products->total() }} productos
                        </p>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">Vista:</span>
                            <button class="p-2 text-blue-600 bg-blue-100 rounded-lg">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    @if ($products->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                            @foreach ($products as $product)
                                <div class="bg-white hover:shadow-xl transition-shadow duration-300">
                                    <!-- Product Image -->
                                    <div class="relative">
                                        <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('images/product-placeholder.jpg') }}"
                                            alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                        {{-- @if ($product->stock == 0)
                                            <div
                                                class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                                Sin Stock
                                            </div>
                                        @elseif($product->stock < 5)
                                            <div
                                                class="absolute top-2 right-2 bg-orange-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                                Últimas Unidades
                                            </div>
                                        @endif
                                        <div
                                            class="absolute top-2 left-2 bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                                            {{ $product->category->name }}
                                        </div> --}}
                                    </div>

                                    <!-- Product Info -->
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        {{-- <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                            {{ $product->description }}
                                        </p> --}}

                                        {{-- @if ($product->price)
                                            <p class="text-2xl font-bold text-blue-600 mb-4">
                                                {{ $product->formatted_price }}
                                            </p>
                                        @endif --}}

                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('catalog.show', $product->slug) }}"
                                                class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-700 transition-colors text-sm font-medium">
                                                Ver Detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $products->links() }}
                        </div>
                    @else
                        <!-- No Products Found -->
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No se encontraron productos</h3>
                            <p class="text-gray-600 mb-4">Intenta ajustar tus filtros de búsqueda</p>
                            <a href="{{ route('catalog.index') }}"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                Ver todos los productos
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script>
        // Auto-submit form when filters change
        document.getElementById('category').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        document.getElementById('sort').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });
    </script>
@endsection
