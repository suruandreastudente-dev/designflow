<?php
$pageTitle = 'Gestione Pacchetti';
$isLoggedIn = true;
$userRole = 'Freelancer';
$userName = 'Giulia Bianchi';
include __DIR__ . '/../layout/header.php';

// Simulazione elenco pacchetti
$pacchetti = isset($pacchetti) ? $pacchetti : [
    [
        'id' => 1,
        'titolo' => 'Sito E-commerce chiavi in mano',
        'prezzo' => 500.00,
        'consegna' => 14,
        'categoria' => 'Sviluppo Web'
    ]
];

$categorie = [
    ['id' => 1, 'nome' => 'Sviluppo Web'],
    ['id' => 2, 'nome' => 'Graphic Design']
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Dashboard -->
    <div class="md:flex md:items-center md:justify-between mb-10 border-b border-gray-200 pb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">I Miei Pacchetti</h2>
            <p class="mt-2 text-sm text-gray-500">Aggiungi, modifica o disattiva i pacchetti commerciali in vetrina.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button onclick="openModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-success-500 hover:bg-success-600 transition">
                <i class="fa-solid fa-plus mr-2"></i> Crea Nuovo Pacchetto
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/freelancer/dashboard_freelancer.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-chart-line text-base"></i>
                <span>Statistiche</span>
            </a>
            <a href="/ProgettoPersonale/views/freelancer/gestione_pacchetti.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-success-700 bg-success-50 rounded-xl transition">
                <i class="fa-solid fa-box-open text-base"></i>
                <span>I Miei Pacchetti</span>
            </a>
            <a href="/ProgettoPersonale/views/freelancer/richieste_ricevute.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-inbox text-base"></i>
                <span>Richieste Ricevute</span>
            </a>
        </div>

        <!-- Dashboard Content -->
        <div class="lg:col-span-3">
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Catalogo Servizi Offerti</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-400 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="px-6 py-4">Titolo Pacchetto</th>
                                <th class="px-6 py-4">Categoria</th>
                                <th class="px-6 py-4">Giorni Consegna</th>
                                <th class="px-6 py-4">Prezzo</th>
                                <th class="px-6 py-4 text-right">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                            <?php foreach($pacchetti as $p): ?>
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-800"><?= htmlspecialchars($p['titolo']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($p['categoria']) ?></td>
                                    <td class="px-6 py-4"><?= $p['consegna'] ?> giorni</td>
                                    <td class="px-6 py-4 font-bold text-success-600">€ <?= number_format($p['prezzo'], 2, ',', '.') ?></td>
                                    <td class="px-6 py-4 text-right space-x-2 whitespace-nowrap">
                                        <button class="text-primary-600 hover:text-primary-800 font-semibold text-xs"><i class="fa-solid fa-pen mr-1"></i>Modifica</button>
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

<!-- Modal Creazione Nuovo Pacchetto -->
<div id="new-package-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-900/60 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-xl w-full border border-gray-100 shadow-2xl p-6 sm:p-8 space-y-6 relative">
        <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600 focus:outline-none">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <div>
            <h3 class="text-xl font-extrabold text-gray-900">Registra un nuovo Pacchetto</h3>
            <p class="text-xs text-gray-400 mt-1">Crea il tuo servizio, definisci il prezzo e inizia a ricevere richieste.</p>
        </div>

        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Titolo del Pacchetto</label>
                <input type="text" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Es. Progettazione Database Relazionale completo">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Categoria</label>
                    <select required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm bg-white text-gray-700 transition">
                        <option value="" disabled selected>Scegli...</option>
                        <?php foreach($categorie as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nome']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Giorni Consegna</label>
                    <input type="number" required min="1" max="60" class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Es. 7">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Prezzo Base (€)</label>
                <input type="number" required min="5" step="5" class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="0.00">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Descrizione Dettagliata</label>
                <textarea required rows="4" class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Spiega esattamente cosa include il servizio..."></textarea>
            </div>

            <div class="pt-4 flex space-x-3">
                <button type="button" onclick="closeModal()" class="w-1/2 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold py-3 rounded-xl text-sm transition">
                    Annulla
                </button>
                <button type="submit" class="w-1/2 bg-success-500 hover:bg-success-600 text-white font-bold py-3 rounded-xl text-sm transition shadow-md shadow-success-500/10">
                    Pubblica Pacchetto
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('new-package-modal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('new-package-modal').classList.add('hidden');
    }
</script>

<?php include __DIR__ . '/../layout/footer.php'; ?>
