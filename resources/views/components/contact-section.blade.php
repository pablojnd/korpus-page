<section class="relative bg-gradient-to-r from-cyan-400 via-blue-500 to-blue-600 overflow-hidden">
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
                    <img src="{{ asset('images/consultancy-img.png') }}" alt="Consultoría médica"
                        class="w-full max-w-sm lg:max-w-md h-auto object-contain drop-shadow-2xl">
                </div>

                <!-- Elementos decorativos alrededor de la doctora -->
                <div class="absolute top-8 right-12 w-10 h-10 bg-white/20 rounded-full animate-pulse"></div>
                <div class="absolute bottom-16 left-8 w-6 h-6 bg-white/25 rounded-full animate-bounce delay-300"></div>
            </div>

            <!-- Formulario -->
            <div class="relative z-10 order-1 lg:order-2">
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 max-w-md mx-auto lg:mr-0">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-3">
                        ¿Necesitas Consultoría Online?
                    </h2>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                        Solo completa el formulario y obtén consulta con los doctores expertos del mundo en pocos
                        minutos.
                    </p>

                    <form method="POST" action="#" class="space-y-4">
                        @csrf
                        <div>
                            <input type="text" id="name" name="name" required placeholder="Nombre"
                                class="w-full px-5 py-3 bg-gray-50 border-0 rounded-xl text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-400 transition-all duration-200 text-sm" />
                        </div>

                        <div>
                            <input type="email" id="email" name="email" required
                                placeholder="Correo electrónico"
                                class="w-full px-5 py-3 bg-gray-50 border-0 rounded-xl text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-400 transition-all duration-200 text-sm" />
                        </div>

                        <div>
                            <select id="department" name="department" required
                                class="w-full px-5 py-3 bg-gray-50 border-0 rounded-xl text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-400 transition-all duration-200 appearance-none cursor-pointer text-sm">
                                <option value="">Elegir Departamento</option>
                                <option value="cardiologia">Cardiología</option>
                                <option value="neurologia">Neurología</option>
                                <option value="pediatria">Pediatría</option>
                                <option value="ginecologia">Ginecología</option>
                                <option value="traumatologia">Traumatología</option>
                                <option value="medicina-general">Medicina General</option>
                            </select>
                        </div>

                        <div>
                            <select id="doctor" name="doctor" required
                                class="w-full px-5 py-3 bg-gray-50 border-0 rounded-xl text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-400 transition-all duration-200 appearance-none cursor-pointer text-sm">
                                <option value="">Elegir Doctor</option>
                                <option value="dr-rodriguez">Dr. Rodríguez</option>
                                <option value="dra-martinez">Dra. Martínez</option>
                                <option value="dr-gonzalez">Dr. González</option>
                                <option value="dra-lopez">Dra. López</option>
                            </select>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 text-sm">
                                Obtener Consultoría Online
                            </button>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Estilos personalizados para los selectores -->
<style>
    /* Estilos para los selectores personalizados */
    select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 1rem center;
        background-repeat: no-repeat;
        background-size: 1.2em 1.2em;
        padding-right: 2.5rem;
    }

    select:focus {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%233b82f6' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    }

    /* Asegurar que la sección sea completamente responsive */
    @media (max-width: 1023px) {
        .grid.lg\\:grid-cols-2>div:first-child {
            order: 2;
        }

        .grid.lg\\:grid-cols-2>div:last-child {
            order: 1;
        }
    }
</style>
