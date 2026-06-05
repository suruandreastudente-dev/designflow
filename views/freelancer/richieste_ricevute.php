<?php
$pageTitle = 'Richieste Ricevute';
$isLoggedIn = true;
$userRole = 'Freelancer';
$userName = 'Giulia Bianchi';
include __DIR__ . '/../layout/header.php';

// Simulazione richieste ricevute
$richieste = isset($richieste) ? $richieste : [
    [
        'id' => 1,
        'cliente' => 'Luigi Verdi',
        'pacchetto_titolo' => 'Sito E-commerce chiavi in mano',
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
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">Richieste Ricevute</h2>
            <p class="mt-2 text-sm text-gray-500">Valuta le proposte inviate dai clienti e avvia gli ordini formali.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1 space-y-2">
            <a href="/ProgettoPersonale/views/freelancer/dashboard_freelancer.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-chart-line text-base"></i>
                <span>Statistiche</span>
            </a>
            <a href="/ProgettoPersonale/views/freelancer/gestione_pacchetti.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-xl transition">
                <i class="fa-solid fa-box-open text-base"></i>
                <span>I Miei Pacchetti</span>
            </a>
            <a href="/ProgettoPersonale/views/freelancer/richieste_ricevute.php" class="flex items-center space-x-3 px-4 py-3 text-sm font-bold text-success-700 bg-success-50 rounded-xl transition">
                <i class="fa-solid fa-inbox text-base"></i>
                <span>Richieste Ricevute</span>
            </a>
        </div>

        <!-- Dashboard Content -->
        <div class="lg:col-span-3 space-y-6">
            <?php if(empty($richieste)): ?>
                <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center text-gray-500">
                    Nessuna richiesta ricevuta al momento.
                </div>
            <?php else: ?>
                <?php foreach($richieste as $req): ?>
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div class="space-y-3 flex-1">
                            <div class="flex items-center space-x-3">
                                <div class="h-9 w-9 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs">
                                    <?= htmlspecialchars(substr($req['cliente'], 0, 2)) ?>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm"><?= htmlspecialchars($req['cliente']) ?></h4>
                                    <p class="text-[10px] text-gray-400">Inviata il <?= htmlspecialchars($req['data']) ?></p>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400 block uppercase tracking-wider font-bold">Servizio Richiesto</span>
                                <h3 class="font-bold text-gray-900 text-base mt-0.5"><?= htmlspecialchars($req['pacchetto_titolo']) ?></h3>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-xl border border-gray-100 italic text-gray-500 text-sm">
                                "<?= htmlspecialchars($req['messaggio']) ?>"
                            </div>
                        </div>

                        <!-- Azioni a Destra -->
                        <div class="flex flex-col gap-2.5 sm:flex-row md:flex-col justify-end w-full md:w-auto">
                            <!-- Stato -->
                            <div class="text-center md:text-right mb-1">
                                <?php if($req['stato'] === 'Accettata'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-50 text-green-700">Accettata</span>
                                <?php elseif($req['stato'] === 'Rifiutata'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-50 text-red-700">Rifiutata</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-700">In Attesa</span>
                                <?php endif; ?>
                            </div>
                            
                            <a href="/ProgettoPersonale/views/client/chat_richiesta.php?id=<?= $req['id'] ?>" class="text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-4 rounded-xl text-xs transition">
                                Apri Chat
                            </a>
                            <?php if($req['stato'] === 'In Attesa'): ?>
                                <button class="bg-success-500 hover:bg-success-600 text-white font-bold py-2.5 px-4 rounded-xl text-xs transition shadow-md shadow-success-500/10">
                                    Accetta Richiesta
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
