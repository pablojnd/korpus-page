<section class="relative overflow-hidden" style="background: linear-gradient(135deg, #1fa2ff 0%, #12749e 100%);">
    <!-- Elementos decorativos de fondo -->
    <div class="absolute inset-0 bg-gradient-to-br from-transparent to-black/10"></div>

    <!-- Círculos decorativos como en la imagen -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full"></div>
    <div class="absolute top-32 left-32 w-12 h-12 bg-white/15 rounded-full"></div>
    <div class="absolute bottom-20 right-20 w-16 h-16 bg-white/10 rounded-full"></div>
    <div class="absolute top-1/3 right-1/3 w-8 h-8 bg-white/20 rounded-full"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[500px]">
            <!-- Imagen de la doctora -->
            <div class="relative flex items-center justify-center lg:justify-start order-2 lg:order-1">
                <!-- Doctora grande apuntando -->
                <div class="relative z-10">
                    <img src="{{ asset('images/consultancy-img.png') }}" alt="Insumos médicos de calidad"
                        class="w-full max-w-md lg:max-w-lg xl:max-w-xl h-auto object-contain drop-shadow-2xl">
                </div>

                <!-- Elementos decorativos alrededor de la doctora -->
                <div class="absolute top-8 right-12 w-10 h-10 bg-white/20 rounded-full animate-pulse"></div>
                <div class="absolute bottom-16 left-8 w-6 h-6 bg-white/25 rounded-full animate-bounce delay-300"></div>
            </div>

            <!-- Formulario -->
            <div class="relative z-10 order-1 lg:order-2">
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 max-w-md mx-auto lg:mr-0">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-3">
                        ¿Necesitas Insumos Médicos?
                    </h2>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                        Contáctanos para obtener los mejores insumos médicos de calidad. Te responderemos a la brevedad
                        con la información que necesites.
                    </p>

                    <form method="POST" action="#" class="space-y-4">
                        @csrf
                        <div>
                            <input type="text" id="name" name="name" required placeholder="Nombre completo"
                                class="w-full px-5 py-3 bg-gray-50 border-0 rounded-xl text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 transition-all duration-200 text-sm"
                                style="--tw-ring-color: #1fa2ff;" />
                        </div>

                        <div>
                            <input type="email" id="email" name="email" required
                                placeholder="Correo electrónico"
                                class="w-full px-5 py-3 bg-gray-50 border-0 rounded-xl text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 transition-all duration-200 text-sm"
                                style="--tw-ring-color: #1fa2ff;" />
                        </div>

                        <div>
                            <textarea id="message" name="message" rows="4" required
                                placeholder="Cuéntanos qué insumos médicos necesitas, cantidades, especificaciones, o cualquier consulta..."
                                class="w-full px-5 py-3 bg-gray-50 border-0 rounded-xl text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 transition-all duration-200 text-sm resize-none"
                                style="--tw-ring-color: #1fa2ff;"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full text-white font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 text-sm"
                                style="background: linear-gradient(135deg, #1fa2ff 0%, #12749e 100%); transition: all 0.3s ease;"
                                onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04)';"
                                onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -2px rgb(0 0 0 / 0.05)';">
                                Enviar Consulta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Estilos personalizados -->
<style>
    /* Asegurar que la sección sea completamente responsive */
    @media (max-width: 1023px) {
        .grid.lg\\:grid-cols-2>div:first-child {
            order: 2;
        }

        .grid.lg\\:grid-cols-2>div:last-child {
            order: 1;
        }
    }

    /* Estilo personalizado para el textarea */
    textarea {
        min-height: 100px;
        font-family: inherit;
    }

    /* Efecto de enfoque mejorado */
    input:focus,
    textarea:focus {
        box-shadow: 0 0 0 3px rgba(31, 162, 255, 0.1);
    }
</style>
