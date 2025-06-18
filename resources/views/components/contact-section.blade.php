<section class="py-16 bg-gradient-to-r from-blue-50 to-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Formulario -->
                <div class="p-8 lg:p-12">
                    <h2 class="text-2xl md:text-3xl font-bold text-blue-700 mb-6">¿Quieres contactarnos?</h2>
                    <p class="text-gray-600 mb-8">Estamos aquí para ayudarte con tus necesidades de equipos médicos.
                        Contáctanos y te responderemos a la brevedad.</p>

                    <form method="POST" action="#" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo
                                    electrónico</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono
                                (opcional)</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                            <textarea id="message" name="message" rows="4" required
                                placeholder="Cuéntanos sobre tus necesidades de equipos médicos..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400"></textarea>
                        </div>
                        <div class="flex justify-start">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition-colors">
                                Enviar Mensaje
                                <svg class="ml-2 w-4 h-4 inline" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Imagen de consultoría -->
                <div class="relative bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center p-8">
                    <div class="relative">
                        <img src="{{ asset('images/consultancy-img.png') }}" alt="Consultoría médica"
                            class="w-full max-w-sm h-auto object-contain drop-shadow-2xl">

                        <!-- Decorative elements -->
                        <div class="absolute -top-4 -right-4 w-8 h-8 bg-blue-200 rounded-full opacity-50"></div>
                        <div class="absolute -bottom-6 -left-6 w-12 h-12 bg-blue-300 rounded-full opacity-30"></div>
                        <div class="absolute top-1/2 -left-8 w-6 h-6 bg-blue-100 rounded-full opacity-40"></div>
                    </div>

                    <!-- Contact info overlay -->
                    <div
                        class="absolute bottom-8 left-8 right-8 bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 text-white">
                        <h3 class="font-semibold mb-2">Información de contacto</h3>
                        <p class="text-sm opacity-90">📧 info@korpus.com</p>
                        <p class="text-sm opacity-90">📞 +1 (555) 123-4567</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
