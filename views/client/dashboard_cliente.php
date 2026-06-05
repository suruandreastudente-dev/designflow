<?php
$pageTitle = 'Dashboard Cliente';
$isLoggedIn = true;
$userRole = 'Cliente';
$userName = 'Mario Rossi';
include __DIR__ . '/../layout/header.php';

// Simulazione statistiche
$statistiche = [
    'richieste_attesa' => 1,
    'ordini_corso' => 1,
    'spesa_totale' => 500.00
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Dashboard -->
    <div class="md:flex md:items-center md:justify-between mb-10 border-b border-gray-200 pb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">Bentornato, <?= htmlspecialchars($userName) ?>!</h2>
            <p class="mt-2 text-sm text-gray-500">Gestisci i tuoi ordini di acquisto e tieni traccia dello stato di avanzamento delle tue richieste.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <a href="/ProgettoPersonale/views/public/catalogo.php" class="inline-flex items-center px-4 py-2 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-primary-600 hover:bg-primary-700 transition">
                <i class="fa-solid fa-magnifying-glass mr-2"></i> Cerca Servizi
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/client/dashboard_cliente.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-primary-700 bg-primary-50 rounded-xl transition">
                <i class="fa-solid fa-chart-pie text-base"></i>
                <span>Panoramica</span>
            </a>
            <a href="/ProgettoPersonale/views/client/le_mie_richieste.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-send-check text-base"></i>
                <span>Le Mie Richieste</span>
            </a>
            <a href="/ProgettoPersonale/views/client/chat_richiesta.php?id=1" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-comments text-base"></i>
                <span>Chat e Messaggi</span>
            </a>
        </div>

        <!-- Dashboard Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Cards Statistiche -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Stat 1 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Richieste In Attesa</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2"><?= $statistiche['richieste_attesa'] ?></h3>
                    </div>
                    <div class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Ordini In Corso</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2"><?= $statistiche['ordini_corso'] ?></h3>
                    </div>
                    <div class="h-12 w-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-spinner animate-spin-slow"></i>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Spesa Totale</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2">€ <?= number_format($statistiche['spesa_totale'], 2, ',', '.') ?></h3>
                    </div>
                    <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                </div>
            </div>

            <!-- Attività Recenti Mock -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 space-y-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3">Ordini attivi in evidenza</h3>
                <div class="divide-y divide-gray-100">
                    <div class="py-4 flex items-center justify-between first:pt-0 last:pb-0">
                        <div class="flex items-center space-x-4">
                            <div class="h-10 w-10 rounded-xl bg-primary-100 text-primary-700 flex items-center justify-center"><i class="fa-solid fa-laptop-code text-base"></i></div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-800">Sito E-commerce chiavi in mano</h4>
                                <p class="text-xs text-gray-400">Freelancer: Giulia Bianchi</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">In Lavorazione</span>
                            <p class="text-xs text-gray-400 mt-1">Consegna stimata: 15 Giu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
