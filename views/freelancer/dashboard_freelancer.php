<?php
$pageTitle = 'Dashboard Freelancer';
$isLoggedIn = true;
$userRole = 'Freelancer';
$userName = 'Giulia Bianchi';
include __DIR__ . '/../layout/header.php';

// Simulazione statistiche freelancer
$stats = [
    'guadagni' => 500.00,
    'ordini_completare' => 0,
    'richieste_nuove' => 0
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Dashboard -->
    <div class="md:flex md:items-center md:justify-between mb-10 border-b border-gray-200 pb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">Pannello Freelancer</h2>
            <p class="mt-2 text-sm text-gray-500">Gestisci i tuoi servizi commerciali, visualizza i guadagni ed evadi le consegne.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/freelancer/dashboard_freelancer.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-success-700 bg-success-50 rounded-xl transition">
                <i class="fa-solid fa-chart-line text-base"></i>
                <span>Statistiche</span>
            </a>
            <a href="/ProgettoPersonale/views/freelancer/gestione_pacchetti.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-box-open text-base"></i>
                <span>I Miei Pacchetti</span>
            </a>
            <a href="/ProgettoPersonale/views/freelancer/richieste_ricevute.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-inbox text-base"></i>
                <span>Richieste Ricevute</span>
            </a>
        </div>

        <!-- Dashboard Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Cards Statistiche -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Guadagni -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Guadagni Netti</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2">€ <?= number_format($stats['guadagni'], 2, ',', '.') ?></h3>
                    </div>
                    <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>

                <!-- Ordini da completare -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Ordini da evadere</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2"><?= $stats['ordini_completare'] ?></h3>
                    </div>
                    <div class="h-12 w-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                </div>

                <!-- Nuove richieste -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Nuove Richieste</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2"><?= $stats['richieste_nuove'] ?></h3>
                    </div>
                    <div class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                </div>
            </div>

            <!-- Informazioni Operative -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 mb-4">Stato Recensioni</h3>
                <div class="flex items-center space-x-6">
                    <div class="text-center">
                        <div class="text-5xl font-extrabold text-gray-900">5.0</div>
                        <div class="flex items-center text-yellow-400 text-sm space-x-1 mt-1 justify-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-gray-400 mt-1.5 font-semibold">1 Valutazione</p>
                    </div>
                    <div class="flex-1 border-l border-gray-100 pl-6 space-y-2">
                        <p class="text-sm text-gray-500 italic">"Lavoro eccezionale e veloce!" - Luigi Verdi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
