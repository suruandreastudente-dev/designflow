<?php
$pageTitle = 'Gestione Categorie';
$isLoggedIn = true;
$userRole = 'Admin';
$userName = 'Alessandro Admin';
include __DIR__ . '/../layout/header.php';

// Simulazione categorie dal database
$categorie = isset($categorie) ? $categorie : [
    ['id' => 1, 'nome' => 'Sviluppo Web', 'descrizione' => 'Creazione di siti web, e-commerce, web application su misura e supporto tecnico.'],
    ['id' => 2, 'nome' => 'Graphic Design', 'descrizione' => 'Creazione di loghi, brand identity, grafiche pubblicitarie e design di interfacce.']
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Dashboard -->
    <div class="md:flex md:items-center md:justify-between mb-10 border-b border-gray-200 pb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">Gestione Categorie</h2>
            <p class="mt-2 text-sm text-gray-500">Crea o elimina le categorie (i Tenant logici del catalogo servizi).</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/admin/dashboard_admin.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-chart-line text-base"></i>
                <span>Statistiche Globali</span>
            </a>
            <a href="/ProgettoPersonale/views/admin/gestione_categorie.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-indigo-700 bg-indigo-50 rounded-xl transition">
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
            <!-- Form Aggiunta Categoria -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm space-y-4">
                <h3 class="text-md font-bold text-gray-900"><i class="fa-solid fa-plus-circle text-indigo-600 mr-1.5"></i> Crea una nuova categoria</h3>
                <form action="" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Nome Categoria</label>
                        <input type="text" required class="block w-full px-4 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="Es. Traduzioni">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Descrizione Breve</label>
                        <input type="text" required class="block w-full px-4 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="Descrizione del servizio...">
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 rounded-xl text-sm shadow-md transition">
                            Crea Categoria
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabella Categorie -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-400 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Nome Categoria</th>
                                <th class="px-6 py-4">Descrizione</th>
                                <th class="px-6 py-4 text-right">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                            <?php foreach($categorie as $cat): ?>
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-mono text-xs text-gray-400">#<?= $cat['id'] ?></td>
                                    <td class="px-6 py-4 font-semibold text-gray-800"><?= htmlspecialchars($cat['nome']) ?></td>
                                    <td class="px-6 py-4 text-xs max-w-xs truncate"><?= htmlspecialchars($cat['descrizione']) ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-red-600 hover:text-red-800 font-semibold text-xs"><i class="fa-solid fa-trash mr-1"></i>Elimina</button>
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
