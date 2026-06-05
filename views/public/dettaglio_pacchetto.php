<?php
$pageTitle = 'Dettaglio Servizio';
include __DIR__ . '/../layout/header.php';

// Simulazione dati pacchetto singolo dal Controller
$pacchetto = isset($pacchetto) ? $pacchetto : [
    'id' => 1,
    'titolo' => 'Sito E-commerce chiavi in mano',
    'descrizione' => 'Costruisco una soluzione completa di e-commerce basata sulle tue esigenze. Il pacchetto include il design del layout, l\'area utente, il carrello elettronico, la gestione del magazzino lato amministratore e l\'integrazione dei principali gateway di pagamento (Stripe/PayPal).',
    'prezzo_base' => 500.00,
    'giorni_consegna' => 14,
    'freelancer_nome' => 'Giulia Bianchi',
    'freelancer_titolo' => 'Senior Web Developer',
    'freelancer_bio' => 'Sviluppatrice web con oltre 8 anni di esperienza, specializzata in e-commerce custom, Laravel e integrazione API esterne.',
    'categoria_nome' => 'Sviluppo Web'
];

$recensioni = isset($recensioni) ? $recensioni : [
    [
        'cliente' => 'Luigi Verdi',
        'voto' => 5,
        'commento' => 'Lavoro eccezionale e veloce! Giulia è stata super disponibile nel comprendere i requisiti e l\'ecommerce è perfetto.',
        'data' => '18 Giugno 2026'
    ]
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Breadcrumbs -->
    <nav class="flex mb-8 text-sm text-gray-500 font-medium space-x-2">
        <a href="/ProgettoPersonale/index.php" class="hover:text-primary-600">Home</a>
        <span>/</span>
        <a href="/ProgettoPersonale/views/public/catalogo.php" class="hover:text-primary-600">Catalogo</a>
        <span>/</span>
        <span class="text-gray-800"><?= htmlspecialchars($pacchetto['categoria_nome']) ?></span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Contenuto Principale (Sinistra) -->
        <div class="lg:col-span-2 space-y-8">
            <div class="space-y-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700">
                    <?= htmlspecialchars($pacchetto['categoria_nome']) ?>
                </span>
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl"><?= htmlspecialchars($pacchetto['titolo']) ?></h1>
            </div>

            <!-- Copertina Mock/Placeholder premium -->
            <div class="h-80 w-full bg-gradient-to-tr from-primary-500 to-indigo-700 rounded-3xl flex items-center justify-center text-white shadow-lg p-8">
                <div class="text-center">
                    <i class="fa-solid fa-store text-6xl opacity-90 mb-4"></i>
                    <h3 class="text-xl font-bold max-w-md mx-auto"><?= htmlspecialchars($pacchetto['titolo']) ?></h3>
                    <p class="text-white/75 text-sm mt-2">Design Responsivo & Gateway di Pagamento Sicuri</p>
                </div>
            </div>

            <!-- Dettaglio Servizio -->
            <div class="bg-white border border-gray-200 rounded-2xl p-8 space-y-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3">Informazioni sul servizio</h3>
                <p class="text-gray-600 leading-relaxed text-sm"><?= nl2br(htmlspecialchars($pacchetto['descrizione'])) ?></p>
            </div>

            <!-- Profilo Freelancer -->
            <div class="bg-white border border-gray-200 rounded-2xl p-8 space-y-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3">Informazioni sul venditore</h3>
                <div class="flex items-center space-x-4">
                    <div class="h-16 w-16 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center font-bold text-2xl border-4 border-primary-50">
                        <?= htmlspecialchars(substr($pacchetto['freelancer_nome'], 0, 2)) ?>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-lg text-gray-900"><?= htmlspecialchars($pacchetto['freelancer_nome']) ?></h4>
                        <p class="text-sm text-primary-600 font-semibold"><?= htmlspecialchars($pacchetto['freelancer_titolo']) ?></p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($pacchetto['freelancer_bio'])) ?></p>
            </div>

            <!-- Recensioni -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold text-gray-900">Recensioni dei Clienti</h3>
                
                <?php if(empty($recensioni)): ?>
                    <p class="text-gray-500 text-sm">Non ci sono ancora recensioni per questo servizio.</p>
                <?php else: ?>
                    <div class="space-y-4">
                        <?php foreach($recensioni as $rec): ?>
                            <div class="bg-white border border-gray-200 rounded-2xl p-6 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-9 w-9 rounded-full bg-gray-100 text-gray-700 flex items-center justify-center font-bold text-xs">
                                            <?= htmlspecialchars(substr($rec['cliente'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-bold text-gray-800"><?= htmlspecialchars($rec['cliente']) ?></h5>
                                            <div class="flex items-center text-yellow-400 text-xs space-x-1 mt-0.5">
                                                <?php for($i=1; $i<=5; $i++): ?>
                                                    <i class="fa-solid fa-star"></i>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-400 font-medium"><?= htmlspecialchars($rec['data']) ?></span>
                                </div>
                                <p class="text-gray-600 text-sm italic">"<?= htmlspecialchars($rec['commento']) ?>"</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Box Acquisto/Richiesta (Destra) -->
        <div class="lg:col-span-1">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-xl shadow-gray-200/40 p-6 sticky top-24 space-y-6">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Prezzo Base</span>
                    <span class="text-3xl font-extrabold text-primary-600">€ <?= number_format($pacchetto['prezzo_base'], 2, ',', '.') ?></span>
                </div>

                <div class="space-y-3.5 border-t border-gray-100 pt-5 text-sm text-gray-600 font-medium">
                    <div class="flex items-center">
                        <i class="fa-solid fa-clock w-6 text-primary-500 text-base"></i>
                        <span>Tempo di consegna: <strong><?= $pacchetto['giorni_consegna'] ?> giorni</strong></span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-arrows-rotate w-6 text-primary-500 text-base"></i>
                        <span>Revisioni illimitate prima della firma</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-shield-halved w-6 text-primary-500 text-base"></i>
                        <span>Zero pagamenti anticipati</span>
                    </div>
                </div>

                <hr class="text-gray-100">

                <!-- Bottone Richiesta Contatto -->
                <a href="/ProgettoPersonale/views/client/chat_richiesta.php?package_id=<?= $pacchetto['id'] ?>" 
                   class="block w-full text-center bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-primary-500/15 hover:shadow-primary-500/25 transition">
                    Contatta per Richiedere
                </a>
                
                <p class="text-xs text-gray-400 text-center leading-normal">
                    Cliccando sul bottone aprirai una chat con il venditore per presentare il tuo progetto. Pagherai solo dopo l'accettazione.
                </p>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
