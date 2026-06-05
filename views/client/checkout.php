<?php
$pageTitle = 'Procedi al Pagamento';
$isLoggedIn = true;
$userRole = 'Cliente';
$userName = 'Mario Rossi';
include __DIR__ . '/../layout/header.php';

// Simulazione dati per il checkout
$ordine_dati = [
    'id' => 1,
    'titolo' => 'Sito E-commerce chiavi in mano',
    'prezzo' => 500.00,
    'freelancer' => 'Giulia Bianchi'
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-10">Pagamento Sicuro</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Dettaglio ordine (1 colonna su desktop) -->
            <div class="md:col-span-1 space-y-4">
                <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider">Riepilogo</h3>
                <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm space-y-4">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900"><?= htmlspecialchars($ordine_dati['titolo']) ?></h4>
                        <p class="text-xs text-gray-400">Freelancer: <?= htmlspecialchars($ordine_dati['freelancer']) ?></p>
                    </div>
                    <div class="border-t border-gray-100 pt-4 flex justify-between items-center text-sm">
                        <span class="text-gray-500 font-medium">Totale da pagare</span>
                        <span class="text-lg font-extrabold text-primary-600">€ <?= number_format($ordine_dati['prezzo'], 2, ',', '.') ?></span>
                    </div>
                </div>
            </div>

            <!-- Form Carta di Credito (2 colonne su desktop) -->
            <div class="md:col-span-2 space-y-4">
                <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider">Metodo di Pagamento</h3>
                <div class="bg-white border border-gray-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
                    <form action="/ProgettoPersonale/views/client/dashboard_cliente.php" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Intestatario Carta</label>
                            <input type="text" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Es. Mario Rossi">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Numero Carta</label>
                            <div class="relative">
                                <input type="text" required class="block w-full px-4 py-3 pl-11 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="4000 1234 5678 9010">
                                <div class="absolute left-4 top-3.5 text-gray-400">
                                    <i class="fa-solid fa-credit-card text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Scadenza</label>
                                <input type="text" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="MM/AA">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">CVV</label>
                                <input type="password" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="•••">
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-success-500 hover:bg-success-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-success-500/20 transition flex items-center justify-center space-x-2">
                                <i class="fa-solid fa-lock text-sm"></i>
                                <span>Paga € <?= number_format($ordine_dati['prezzo'], 2, ',', '.') ?> in Sicurezza</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
