<?php
$pageTitle = 'Gestione Utenti';
$isLoggedIn = true;
$userRole = 'Admin';
$userName = 'Alessandro Admin';
include __DIR__ . '/../layout/header.php';

// Simulazione utenti registrati
$utenti = isset($utenti) ? $utenti : [
    ['id' => 1, 'nome' => 'Mario Rossi', 'email' => 'admin@test.com', 'ruolo' => 'Admin', 'stato' => 'Attivo'],
    ['id' => 2, 'nome' => 'Luigi Verdi', 'email' => 'cliente@test.com', 'ruolo' => 'Cliente', 'stato' => 'Attivo'],
    ['id' => 3, 'nome' => 'Giulia Bianchi', 'email' => 'freelancer@test.com', 'ruolo' => 'Freelancer', 'stato' => 'Attivo']
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Dashboard -->
    <div class="md:flex md:items-center md:justify-between mb-10 border-b border-gray-200 pb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">Gestione Utenti</h2>
            <p class="mt-2 text-sm text-gray-500">Gestisci i profili registrati sul sito, visualizza i loro ruoli e sospendi temporaneamente gli account.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/admin/dashboard_admin.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-chart-line text-base"></i>
                <span>Statistiche Globali</span>
            </a>
            <a href="/ProgettoPersonale/views/admin/gestione_categorie.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-tags text-base"></i>
                <span>Gestione Categorie</span>
            </a>
            <a href="/ProgettoPersonale/views/admin/gestione_utenti.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-indigo-700 bg-indigo-50 rounded-xl transition">
                <i class="fa-solid fa-users text-base"></i>
                <span>Gestione Utenti</span>
            </a>
        </div>

        <!-- Dashboard Content -->
        <div class="lg:col-span-3">
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Anagrafica Utenti</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-400 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Nome Utente</th>
                                <th class="px-6 py-4">Email</th>
                                <th class="px-6 py-4">Ruolo</th>
                                <th class="px-6 py-4">Stato</th>
                                <th class="px-6 py-4 text-right">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                            <?php foreach($utenti as $user): ?>
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-mono text-xs text-gray-400">#<?= $user['id'] ?></td>
                                    <td class="px-6 py-4 font-semibold text-gray-800"><?= htmlspecialchars($user['nome']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($user['email']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php if($user['ruolo'] === 'Admin'): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-50 text-purple-700">Admin</span>
                                        <?php elseif($user['ruolo'] === 'Freelancer'): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-50 text-green-700">Freelancer</span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700">Cliente</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-50 text-green-700">
                                            <?= htmlspecialchars($user['stato']) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap">
                                        <button class="text-red-600 hover:text-red-800 font-semibold text-xs"><i class="fa-solid fa-user-slash mr-1"></i>Sospendi</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
