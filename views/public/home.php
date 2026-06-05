<?php
$pageTitle = 'Home';
include __DIR__ . '/../layout/header.php';
?>

<!-- Hero Section -->
<div class="relative bg-white overflow-hidden border-b border-gray-100">
    <!-- Background patterns -->
    <div class="absolute inset-0 z-0 opacity-40">
        <div class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-primary-50 to-transparent"></div>
        <svg class="absolute right-0 top-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
            <polygon points="50,0 100,0 50,100 0,100" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20 lg:py-32">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-100 text-primary-800 mb-6">
                    <span class="flex h-2 w-2 rounded-full bg-primary-600 mr-2 animate-ping"></span>
                    Modello sicuro "Richiedi prima, paga poi"
                </span>
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                    <span class="block">Trova il talento</span>
                    <span class="block text-primary-600">perfetto per te.</span>
                </h1>
                <p class="mt-4 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                    Sfoglia servizi digitali offerti da professionisti e richiedi disponibilità direttamente. Zero acconti fino a quando il freelancer non approva il tuo progetto.
                </p>
                
                <!-- Barra di Ricerca -->
                <div class="mt-8 sm:max-w-xl sm:mx-auto lg:mx-0">
                    <form action="/ProgettoPersonale/views/public/catalogo.php" method="GET" class="sm:flex shadow-xl shadow-gray-200/50 rounded-2xl overflow-hidden border border-gray-200">
                        <div class="min-w-0 flex-1 relative">
                            <input type="text" name="search" placeholder="Es. Sviluppo e-commerce, Logo Design, Traduzione..." 
                                   class="block w-full px-5 py-4 text-base text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-0 border-0">
                            <div class="absolute right-4 top-4 text-gray-400 hidden sm:block">
                                <i class="fa-solid fa-magnifying-glass text-lg"></i>
                            </div>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <button type="submit" class="block w-full py-4 px-6 rounded-none sm:rounded-none bg-primary-600 hover:bg-primary-700 text-white font-semibold text-base transition">
                                Cerca
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Hero Visual Graphic (Freelancers Avatar/Stats Demo Card) -->
            <div class="mt-16 sm:mt-24 lg:mt-0 lg:col-span-6 flex justify-center">
                <div class="relative w-full max-w-md">
                    <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
                    <div class="absolute -bottom-8 -right-4 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
                    
                    <div class="relative bg-white border border-gray-100 rounded-3xl shadow-2xl p-8 space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2">
                                <span class="block w-3 h-3 bg-red-400 rounded-full"></span>
                                <span class="block w-3 h-3 bg-yellow-400 rounded-full"></span>
                                <span class="block w-3 h-3 bg-green-400 rounded-full"></span>
                            </div>
                            <span class="text-xs font-semibold text-primary-600 bg-primary-50 px-2.5 py-1 rounded-full">Live Stats</span>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Card Stat 1 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-100 shadow-sm hover:scale-102 transition duration-300">
                                <div class="h-10 w-10 rounded-xl bg-indigo-500 text-white flex items-center justify-center text-lg"><i class="fa-solid fa-code"></i></div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-sm text-gray-800">Sviluppo Web</h4>
                                    <p class="text-xs text-gray-500">142 Freelancer attivi</p>
                                </div>
                                <span class="text-xs font-medium text-gray-400">Da €90</span>
                            </div>
                            <!-- Card Stat 2 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-100 shadow-sm hover:scale-102 transition duration-300">
                                <div class="h-10 w-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center text-lg"><i class="fa-solid fa-pen-nib"></i></div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-sm text-gray-800">Graphic Design</h4>
                                    <p class="text-xs text-gray-500">98 Freelancer attivi</p>
                                </div>
                                <span class="text-xs font-medium text-gray-400">Da €45</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sezione Categorie -->
<div class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Esplora le Categorie</h2>
            <p class="mt-4 text-lg text-gray-500">I nostri professionisti coprono tutte le aree tecnologiche necessarie per lanciare la tua idea.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Categoria 1 -->
            <a href="/ProgettoPersonale/views/public/catalogo.php?categoria=1" class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:border-primary-500 transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="h-12 w-12 rounded-xl bg-primary-100 text-primary-600 flex items-center justify-center text-xl group-hover:bg-primary-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mt-6 group-hover:text-primary-600 transition">Sviluppo Web</h3>
                    <p class="text-gray-500 text-sm mt-2">Siti e-commerce, web application strutturate e database.</p>
                </div>
                <div class="mt-6 flex items-center text-sm font-semibold text-primary-600 group-hover:translate-x-1 transition duration-300">
                    Esplora <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </div>
            </a>
            
            <!-- Categoria 2 -->
            <a href="/ProgettoPersonale/views/public/catalogo.php?categoria=2" class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:border-primary-500 transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="h-12 w-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl group-hover:bg-indigo-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mt-6 group-hover:text-indigo-600 transition">Graphic Design</h3>
                    <p class="text-gray-500 text-sm mt-2">Logo design, brand identity e UI/UX mockups moderni.</p>
                </div>
                <div class="mt-6 flex items-center text-sm font-semibold text-indigo-600 group-hover:translate-x-1 transition duration-300">
                    Esplora <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Ultimi Pacchetti Inseriti (Vetrina Dinamica) -->
<div class="bg-white py-20 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900">Ultimi Servizi Offerti</h2>
                <p class="mt-2 text-gray-500">Pacchetti chiavi in mano pronti per essere ordinati.</p>
            </div>
            <a href="/ProgettoPersonale/views/public/catalogo.php" class="text-sm font-bold text-primary-600 hover:text-primary-700 flex items-center transition">
                Vedi tutti i servizi <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card Pacchetto Dummy Realistico -->
            <div class="group bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col justify-between">
                <div>
                    <!-- Copertina o segnaposto grafico premium -->
                    <div class="h-48 bg-gradient-to-tr from-indigo-500 to-indigo-800 relative flex items-center justify-center text-white p-6 text-center">
                        <span class="absolute top-4 left-4 bg-primary-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full">Sviluppo Web</span>
                        <div>
                            <i class="fa-solid fa-store text-4xl mb-3 opacity-90"></i>
                            <h4 class="font-bold text-lg truncate">Sito E-commerce chiavi in mano</h4>
                        </div>
                    </div>

                    <!-- Profilo Freelancer -->
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs">
                                GB
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-gray-900">Giulia Bianchi</h5>
                                <p class="text-xs text-gray-400">Senior Web Developer</p>
                            </div>
                        </div>

                        <!-- Titolo -->
                        <h3 class="font-bold text-gray-900 group-hover:text-primary-600 transition text-base line-clamp-2">
                            Sito E-commerce completo con pagamenti integrati e area utente.
                        </h3>
                        
                        <!-- Stelle Recensione -->
                        <div class="flex items-center mt-3 text-yellow-400 space-x-1 text-sm">
                            <i class="fa-solid fa-star"></i>
                            <span class="text-gray-900 font-bold">5.0</span>
                            <span class="text-gray-400 font-normal text-xs">(1 recensione)</span>
                        </div>
                    </div>
                </div>

                <!-- Footer Card -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                    <div class="text-left">
                        <span class="text-[10px] text-gray-400 block uppercase tracking-wider font-bold">A PARTIRE DA</span>
                        <span class="text-lg font-extrabold text-primary-600">€ 500,00</span>
                    </div>
                    <a href="/ProgettoPersonale/views/public/dettaglio_pacchetto.php?id=1" class="bg-white hover:bg-primary-600 text-primary-600 hover:text-white px-4 py-2 rounded-xl text-xs font-bold border border-primary-500/20 hover:border-transparent transition">
                        Dettaglio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
