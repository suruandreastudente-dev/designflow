<?php
$pageTitle = 'Dashboard Amministratore';
$isLoggedIn = true;
$userRole = 'Admin';
$userName = 'Alessandro Admin';
include __DIR__ . '/../layout/header.php';

// Simulazione metriche globali
$stats = [
    'utenti_totali' => 3,
    'transazioni_completate' => 1,
    'volume_affari' => 500.00,
    'pacchetti_attivi' => 2
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Dashboard -->
    <div class="md:flex md:items-center md:justify-between mb-10 border-b border-gray-200 pb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">Pannello di Amministrazione</h2>
            <p class="mt-2 text-sm text-gray-500">Monitora le metriche della piattaforma, gestisci gli iscritti ed i tenant delle categorie.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/admin/dashboard_admin.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-indigo-700 bg-indigo-50 rounded-xl transition">
                <i class="fa-solid fa-chart-line text-base"></i>
                <span>Statistiche Globali</span>
            </a>
            <a href="/ProgettoPersonale/views/admin/gestione_categorie.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-tags text-base"></i>
                <span>Gestione Categorie</span>
            </a>
            <a href="/ProgettoPersonale/views/admin/gestione_utenti.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-users text-base"></i>
                <span>Gestione Utenti</span>
            </a>
        </div>

        <!-- Dashboard Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Cards Statistiche Globali -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Utenti -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Utenti Registrati</p>
                        <h3 class="text-2xl font-extrabold text-gray-800 mt-2"><?= $stats['utenti_totali'] ?></h3>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>

                <!-- Pacchetti -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Servizi in Vetrina</p>
                        <h3 class="text-2xl font-extrabold text-gray-800 mt-2"><?= $stats['pacchetti_attivi'] ?></h3>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-box"></i>
                    </div>
                </div>

                <!-- Transazioni -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Transazioni OK</p>
                        <h3 class="text-2xl font-extrabold text-gray-800 mt-2"><?= $stats['transazioni_completate'] ?></h3>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                </div>

                <!-- Volume Affari -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Volume Transato</p>
                        <h3 class="text-2xl font-extrabold text-gray-800 mt-2">€ <?= number_format($stats['volume_affari'], 0, ',', '.') ?></h3>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <!-- Informazioni di Manutenzione -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 mb-4">Stato del Sistema</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-600">
                    <div class="space-y-2">
                        <p>Versione PHP: <strong><?= phpversion() ?></strong></p>
                        <p>Database DBMS: <strong>MariaDB / MySQL</strong></p>
                    </div>
                    <div class="space-y-2">
                        <p>Stato Connessione Database: <span class="text-green-600 font-bold"><i class="fa-solid fa-circle-check mr-1"></i>Attivo</span></p>
                        <p>Modalità Debug: <span class="text-indigo-600 font-bold">Abilitato</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
