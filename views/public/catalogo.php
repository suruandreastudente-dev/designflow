<?php
$pageTitle = 'Esplora Servizi';
include __DIR__ . '/../layout/header.php';

// Simulazione array pacchetti dal Controller
$pacchetti = isset($pacchetti) ? $pacchetti : [
    [
        'id' => 1,
        'titolo' => 'Sito E-commerce chiavi in mano',
        'descrizione' => 'Soluzione e-commerce completa con carrello, area utente e integrazione pagamenti.',
        'freelancer' => 'Giulia Bianchi',
        'freelancer_titolo' => 'Senior Web Developer',
        'categoria' => 'Sviluppo Web',
        'prezzo' => 500.00,
        'consegna' => 14,
        'rating' => 5.0,
        'recensioni' => 1
    ]
];

$categorie = isset($categorie) ? $categorie : [
    ['id' => 1, 'nome' => 'Sviluppo Web'],
    ['id' => 2, 'nome' => 'Graphic Design']
];
?>

<div class="bg-gray-50 border-b border-gray-200 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Catalogo Servizi</h1>
        <p class="mt-2 text-sm text-gray-500">Trova il pacchetto ideale, contatta il freelancer per discutere i dettagli e attiva l'ordine senza acconti anticipati.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="lg:grid lg:grid-cols-4 lg:gap-8">
        
        <!-- Sidebar Filtri -->
        <div class="hidden lg:block lg:col-span-1 space-y-8">
            <form action="" method="GET" class="space-y-6">
                <!-- Ricerca testuale -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">Parola Chiave</h3>
                    <div class="relative">
                        <input type="text" name="query" placeholder="Cerca..." 
                               class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Categorie (Tenant) -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">Categoria</h3>
                    <div class="space-y-2.5">
                        <?php foreach($categorie as $cat): ?>
                            <label class="flex items-center space-x-3 text-sm text-gray-600">
                                <input type="checkbox" name="categoria[]" value="<?= $cat['id'] ?>" class="h-4.5 w-4.5 text-primary-600 focus:ring-primary-500 border-gray-300 rounded-md">
                                <span><?= htmlspecialchars($cat['nome']) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Range di prezzo -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">Budget Massimo</h3>
                    <input type="range" name="prezzo_max" min="50" max="1000" step="50" value="500" 
                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary-600" 
                           oninput="document.getElementById('prezzo-value').innerText = this.value">
                    <div class="flex justify-between text-xs text-gray-400 mt-2 font-medium">
                        <span>€50</span>
                        <span>€<span id="prezzo-value">500</span></span>
                        <span>€1000</span>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2.5 rounded-xl text-sm shadow-md transition">
                    Applica Filtri
                </button>
            </form>
        </div>

        <!-- Lista Servizi -->
        <div class="lg:col-span-3 mt-8 lg:mt-0">
            <div class="flex items-center justify-between mb-8">
                <span class="text-sm text-gray-500 font-medium">Trovati <strong class="text-gray-900"><?= count($pacchetti) ?></strong> servizi</span>
                
                <!-- Ordinamento -->
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <span>Ordina per:</span>
                    <select class="border border-gray-300 rounded-lg px-2.5 py-1 text-sm font-medium focus:outline-none focus:ring-1 focus:ring-primary-500 bg-white text-gray-700">
                        <option>Più popolari</option>
                        <option>Prezzo crescente</option>
                        <option>Prezzo decrescente</option>
                    </select>
                </div>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($pacchetti as $pacchetto): ?>
                    <div class="group bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:scale-[1.01] transition duration-300 flex flex-col justify-between">
                        <div>
                            <!-- Header visual -->
                            <div class="h-44 bg-gradient-to-tr from-indigo-500 to-indigo-700 relative flex items-center justify-center text-white p-6 text-center">
                                <span class="absolute top-3.5 left-3.5 bg-primary-600/90 backdrop-blur-sm text-white text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded-full">
                                    <?= htmlspecialchars($pacchetto['categoria']) ?>
                                </span>
                                <div>
                                    <i class="fa-solid fa-laptop-code text-3xl mb-2.5 opacity-90"></i>
                                    <h4 class="font-bold text-base line-clamp-1"><?= htmlspecialchars($pacchetto['titolo']) ?></h4>
                                </div>
                            </div>

                            <!-- Dettagli -->
                            <div class="p-5">
                                <div class="flex items-center space-x-2.5 mb-3.5">
                                    <div class="h-8 w-8 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center font-bold text-xs">
                                        <?= htmlspecialchars(substr($pacchetto['freelancer'], 0, 2)) ?>
                                    </div>
                                    <div>
                                        <h5 class="text-xs font-semibold text-gray-900"><?= htmlspecialchars($pacchetto['freelancer']) ?></h5>
                                        <p class="text-[10px] text-gray-400"><?= htmlspecialchars($pacchetto['freelancer_titolo']) ?></p>
                                    </div>
                                </div>

                                <h3 class="font-bold text-gray-900 group-hover:text-primary-600 transition text-sm line-clamp-2">
                                    <?= htmlspecialchars($pacchetto['descrizione']) ?>
                                </h3>
                                
                                <div class="flex items-center mt-3 text-yellow-400 space-x-1 text-xs font-bold">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="text-gray-900"><?= number_format($pacchetto['rating'], 1) ?></span>
                                    <span class="text-gray-400 font-normal">(<?= $pacchetto['recensioni'] ?>)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Card -->
                        <div class="px-5 py-3.5 bg-gray-50 border-t border-gray-100 flex items-center justify-between text-sm">
                            <div class="text-left">
                                <span class="text-[9px] text-gray-400 block uppercase tracking-wider font-bold">A PARTIRE DA</span>
                                <span class="text-base font-extrabold text-primary-600">€ <?= number_format($pacchetto['prezzo'], 2, ',', '.') ?></span>
                            </div>
                            <a href="/ProgettoPersonale/views/public/dettaglio_pacchetto.php?id=<?= $pacchetto['id'] ?>" class="bg-white hover:bg-primary-600 text-primary-600 hover:text-white px-3.5 py-1.5 rounded-xl text-xs font-bold border border-primary-500/20 hover:border-transparent transition">
                                Dettaglio
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
