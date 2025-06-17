<div>
    <section class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div>
                    <div class="bg-white bg-opacity-20 rounded-full px-6 py-2 inline-block mb-6">
                        <span class="text-sm font-medium">Somos Felices de Ayudarte</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                        Te Proporcionamos los
                        <span class="text-blue-200">Equipos Médicos Perfectos</span>
                        que Necesitas
                    </h1>
                    <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                        Con más de 10 años de experiencia en el mercado, somos especialistas en el proveedor
                        de confianza para hospitales y clínicas en todo el país. Ofrecemos de equipos
                        médicos de confianza para tu institución de la más alta calidad.
                    </p>
                    <a href="{{ route('catalog.index') }}"
                        class="bg-white text-blue-600 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-50 transition-colors inline-flex items-center">
                        Ver Catálogo
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>

                <!-- Image -->
                <div class="relative">
                    <div class="bg-white rounded-3xl p-8 shadow-2xl">
                        <img src="/images/medical-team.jpg" alt="Equipo médico profesional"
                            class="w-full h-80 object-cover rounded-2xl">

                        <!-- Stats Card -->
                        <div class="absolute -bottom-6 -left-6 bg-white rounded-xl p-4 shadow-lg">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-gray-900">98%</p>
                                    <p class="text-sm text-gray-600">Satisfacción</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
