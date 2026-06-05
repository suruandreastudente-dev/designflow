<?php
$pageTitle = 'Consegna Lavoro';
$isLoggedIn = true;
$userRole = 'Freelancer';
$userName = 'Giulia Bianchi';
include __DIR__ . '/../layout/header.php';

// Simulazione ordine da consegnare
$ordine = [
    'id' => 'ORD-2026-8102',
    'pacchetto_titolo' => 'Sito E-commerce chiavi in mano',
    'cliente' => 'Luigi Verdi',
    'prezzo' => 500.00
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-3xl mx-auto space-y-8">
        <!-- Back Link -->
        <a href="/ProgettoPersonale/views/freelancer/dashboard_freelancer.php" class="text-sm font-medium text-gray-500 hover:text-gray-700">
            <i class="fa-solid fa-arrow-left mr-1.5"></i> Torna alla Dashboard
        </a>

        <div class="bg-white border border-gray-200 rounded-3xl p-6 sm:p-8 shadow-xl shadow-gray-100/50 space-y-6">
            <div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700">
                    Consegna Ordine
                </span>
                <h2 class="text-2xl font-extrabold text-gray-900 mt-2">Invia il lavoro completato</h2>
                <p class="text-xs text-gray-400 mt-1">Carica gli allegati finali e scrivi una nota di consegna per il cliente.</p>
            </div>

            <!-- Dettagli Ordine Summary -->
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-4 flex justify-between items-center text-sm">
                <div>
                    <h4 class="font-bold text-gray-800"><?= htmlspecialchars($ordine['pacchetto_titolo']) ?></h4>
                    <p class="text-xs text-gray-400">Codice: <?= htmlspecialchars($ordine['id']) ?> | Cliente: <?= htmlspecialchars($ordine['cliente']) ?></p>
                </div>
                <span class="text-base font-extrabold text-success-600">€ <?= number_format($ordine['prezzo'], 2, ',', '.') ?></span>
            </div>

            <form action="/ProgettoPersonale/views/freelancer/dashboard_freelancer.php" method="POST" class="space-y-6">
                <!-- Messaggio Consegna -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nota di consegna per il cliente</label>
                    <textarea required rows="5" class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Descrivi il lavoro consegnato, le credenziali d'accesso o le istruzioni d'uso..."></textarea>
                </div>

                <!-- Drag & Drop File Upload Simulato -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Carica elaborati finali</label>
                    <div class="border-2 dashed border-gray-300 hover:border-primary-500 bg-gray-50/50 hover:bg-primary-50/30 rounded-2xl p-8 text-center cursor-pointer transition">
                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-gray-400 mb-2"></i>
                        <p class="text-sm font-bold text-gray-700">Trascina qui il file ZIP o l'immagine di consegna</p>
                        <p class="text-xs text-gray-400 mt-1">Dimensioni massime: 10MB (Formati accettati: .zip, .png, .jpg)</p>
                    </div>
                </div>

                <!-- Aggiungi a Portfolio Checkbox -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="portfolio" name="portfolio" type="checkbox" checked class="focus:ring-primary-500 h-4.5 w-4.5 text-primary-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="portfolio" class="font-bold text-gray-800">Mostra questa consegna nel mio portfolio pubblico</label>
                        <p class="text-xs text-gray-400 mt-0.5">Se spuntato, gli altri utenti potranno vedere l'immagine del lavoro completato nella pagina dei tuoi servizi.</p>
                    </div>
                </div>

                <!-- Pulsanti -->
                <div class="pt-4 flex space-x-3">
                    <a href="/ProgettoPersonale/views/freelancer/dashboard_freelancer.php" class="w-1/2 text-center bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold py-3.5 rounded-xl text-sm transition">
                        Annulla
                    </a>
                    <button type="submit" class="w-1/2 bg-success-500 hover:bg-success-600 text-white font-bold py-3.5 rounded-xl text-sm transition shadow-lg shadow-success-500/20">
                        Invia e Completa Ordine
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
