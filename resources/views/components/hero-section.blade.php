<div>
    <section class="relative text-white overflow-visible bg-cover bg-center bg-no-repeat min-h-[600px]"
        style="background-image: url('{{ asset('images/hero-section.jpg') }}');">

        <!-- Background overlay - solo afecta el fondo, no el doctor -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-800/70 to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[500px]">
                <!-- Content -->
                <div class="z-10">
                    <div class="bg-white bg-opacity-20 rounded-full px-6 py-2 inline-block mb-6">
                        <span class="text-sm font-medium text-black">Somos Felices de Ayudarte</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight drop-shadow-lg">
                        Te Proporcionamos los
                        <span class="text-blue-200">Equipos Médicos Perfectos</span>
                        que Necesitas
                    </h1>
                    {{-- <p class="text-xl text-blue-100 mb-8 leading-relaxed drop-shadow-md">
                        Con más de 10 años de experiencia en el mercado, somos especialistas en el proveedor
                        de confianza para hospitales y clínicas en todo el país. Ofrecemos de equipos
                        médicos de confianza para tu institución de la más alta calidad.
                    </p> --}}
                    {{-- <a href="{{ route('catalog.index') }}"
                        class="bg-white text-blue-600 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-50 transition-colors inline-flex items-center shadow-lg">
                        Ver Catálogo
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a> --}}
                </div>

                <!-- Doctor Image - Sobresale de la sección -->
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative z-20">
                        <!-- Doctor que sobresale -->
                        <img src="{{ asset('images/doctor.png') }}" alt="Doctor profesional"
                            class="w-full max-w-sm lg:max-w-md h-auto object-contain drop-shadow-2xl transform translate-y-8 lg:translate-y-12">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
