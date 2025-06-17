<nav class="bg-blue-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-auto" src="/images/korpus-logo.png" alt="Korpus">
                    <span class="ml-2 text-white text-xl font-bold">KORPUS</span>
                </div>
            </div> <!-- Navigation Links - Desktop -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="/"
                        class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Inicio
                    </a>
                    <a href="#"
                        class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Empresa
                    </a>
                    <a href="#"
                        class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Productos
                    </a>
                    <a href="#"
                        class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Contacto
                    </a>
                </div>
            </div>

            <!-- Contact Button -->
            <div class="hidden md:block">
                <button
                    class="bg-white text-blue-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-50 transition-colors">
                    Contáctanos
                </button>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-white hover:text-blue-200 focus:outline-none focus:text-blue-200"
                    onclick="toggleMobileMenu()">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div> <!-- Mobile menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-blue-700">
            <a href="/" class="text-white hover:text-blue-200 block px-3 py-2 rounded-md text-base font-medium">
                Inicio
            </a>
            <a href="#" class="text-white hover:text-blue-200 block px-3 py-2 rounded-md text-base font-medium">
                Empresa
            </a>
            <a href="#" class="text-white hover:text-blue-200 block px-3 py-2 rounded-md text-base font-medium">
                Productos
            </a>
            <a href="#" class="text-white hover:text-blue-200 block px-3 py-2 rounded-md text-base font-medium">
                Contacto
            </a>
            <button class="w-full text-left bg-white text-blue-600 px-3 py-2 rounded-md text-base font-medium mt-2">
                Contáctanos
            </button>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>
