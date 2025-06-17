@props(['productAttributes' => []])

@if ($productAttributes && count($productAttributes) > 0)
    <div class="bg-gray-50 rounded-lg p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($productAttributes as $key => $value)
                <div class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                    <span class="font-medium text-gray-700 capitalize">
                        {{ is_string($key) ? str_replace('_', ' ', $key) : $key }}:
                    </span>
                    <span class="text-gray-600 text-right">{{ $value }}</span>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-gray-500 italic">No hay especificaciones técnicas disponibles.</p>
    </div>
@endif
