@extends('layouts.app')

@section('content')
    <!-- This is just a fallback if someone tries to access welcome directly -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Bienvenido a Korpus</h1>
            <p class="text-gray-600 mb-8">Equipos médicos de calidad</p>
            <a href="{{ route('home') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                Ir al Home
            </a>
        </div>
    </div>
@endsection
