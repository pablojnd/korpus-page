@extends('layouts.app')

@section('title', 'Korpus - Equipos Médicos de Calidad')

@section('content')
    <!-- Hero Section -->
    @include('components.hero-section')

    <!-- Services Section -->
    @include('components.services-section')

    <!-- Quality Services Section -->
    @include('components.quality-services-section')

    <!-- Testimonials Section -->
    @include('components.testimonials-section')

    <!-- Brands Section -->
    @include('components.brands-section')

    <!-- Contact Section -->
    @include('components.contact-section')
@endsection
