<?php
$pageTitle = 'Le Mie Richieste';
$isLoggedIn = true;
$userRole = 'Cliente';
$userName = 'Mario Rossi';
include __DIR__ . '/../layout/header.php';

// Simulazione elenco richieste
$richieste = isset($richieste) ? $richieste : [
    [
        'id' => 1,
        'pacchetto_titolo' => 'Sito E-commerce chiavi in mano',
        'freelancer' => 'Giulia Bianchi',
        'data' => '01 Giugno 2026',
        'messaggio' => 'Ciao Giulia, mi serve un sito per il mio negozio di scarpe...',
        'stato' => 'Accettata'
    ]
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Dashboard -->
    <div class="md:flex md:items-center md:justify-between mb-10 border-b border-gray-200 pb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">Le Mie Richieste</h2>
            <p class="mt-2 text-sm text-gray-500">Visualizza le richieste di preventivo o disponibilità che hai inviato ai vari freelancer.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/client/dashboard_cliente.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-chart-pie text-base"></i>
                <span>Panoramica</span>
            </a>
            <a href="/ProgettoPersonale/views/client/le_mie_richieste.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-primary-700 bg-primary-50 rounded-xl transition">
                <i class="fa-solid fa-send-check text-base"></i>
                <span>Le Mie Richieste</span>
            </a>
            <a href="/ProgettoPersonale/views/client/chat_richiesta.php?id=1" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-comments text-base"></i>
                <span>Chat e Messaggi</span>
            </a>
        </div>

        <!-- Dashboard Content -->
        <div class="lg:col-span-3">
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Storico Richieste</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-400 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="px-6 py-4">Servizio/Freelancer</th>
                                <th class="px-6 py-4">Data Invio</th>
                                <th class="px-6 py-4">Messaggio</th>
                                <th class="px-6 py-4">Stato</th>
                                <th class="px-6 py-4 text-right">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                            <?php foreach($richieste as $req): ?>
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-800">
                                        <p class="truncate max-w-[200px]"><?= htmlspecialchars($req['pacchetto_titolo']) ?></p>
                                        <span class="text-xs text-gray-400 font-normal"><?= htmlspecialchars($req['freelancer']) ?></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($req['data']) ?></td>
                                    <td class="px-6 py-4 italic text-gray-400 truncate max-w-[180px]">"<?= htmlspecialchars($req['messaggio']) ?>"</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php if($req['stato'] === 'Accettata'): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-50 text-green-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                                Accettata
                                            </span>
                                        <?php elseif($req['stato'] === 'Rifiutata'): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-50 text-red-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                                Rifiutata
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                                                In Attesa
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap">
                                        <a href="/ProgettoPersonale/views/client/chat_richiesta.php?id=<?= $req['id'] ?>" class="text-primary-600 hover:text-primary-800 font-bold hover:underline">Apri Chat</a>
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
