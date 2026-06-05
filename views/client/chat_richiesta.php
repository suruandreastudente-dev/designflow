<?php
$pageTitle = 'Chat Richiesta';
$isLoggedIn = true;
$userRole = 'Cliente';
$userName = 'Mario Rossi';
include __DIR__ . '/../layout/header.php';

// Simulazione dati richiesta e chat
$richiesta = isset($richiesta) ? $richiesta : [
    'id' => 1,
    'stato' => 'Accettata',
    'pacchetto_titolo' => 'Sito E-commerce chiavi in mano',
    'prezzo' => 500.00,
    'giorni_consegna' => 14,
    'freelancer' => 'Giulia Bianchi',
    'freelancer_titolo' => 'Senior Web Developer'
];

$messaggi = isset($messaggi) ? $messaggi : [
    [
        'mittente' => 'Luigi Verdi',
        'ruolo_mittente' => 'Cliente',
        'testo' => 'Hai bisogno delle foto dei prodotti prima di iniziare?',
        'data' => '10:05'
    ],
    [
        'mittente' => 'Giulia Bianchi',
        'ruolo_mittente' => 'Freelancer',
        'testo' => 'Sì esatto, mandamele qui. Intanto accetto la richiesta così puoi procedere al pagamento.',
        'data' => '10:15'
    ]
];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 h-[calc(100vh-4rem)] flex flex-col">
    <div class="flex-1 lg:grid lg:grid-cols-4 lg:gap-8 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl shadow-gray-100">
        
        <!-- Sidebar Contatti/Richieste (1 colonna) -->
        <div class="hidden lg:flex flex-col border-r border-gray-200 bg-gray-50 h-full">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider">Conversazioni</h3>
            </div>
            <div class="flex-1 overflow-y-auto p-2 space-y-1">
                <a href="#" class="flex items-center space-x-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <div class="h-9 w-9 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center font-bold text-xs">
                        GB
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-xs font-bold text-gray-800 truncate"><?= htmlspecialchars($richiesta['freelancer']) ?></h4>
                        <p class="text-[10px] text-gray-400 truncate"><?= htmlspecialchars($richiesta['pacchetto_titolo']) ?></p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Chat Area (2 colonne) -->
        <div class="lg:col-span-2 flex flex-col h-full overflow-hidden">
            <!-- Header Chat -->
            <div class="p-4 border-b border-gray-200 flex items-center justify-between bg-white z-10">
                <div class="flex items-center space-x-3">
                    <div class="h-9 w-9 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center font-bold text-xs">
                        GB
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-900"><?= htmlspecialchars($richiesta['freelancer']) ?></h4>
                        <p class="text-[10px] text-gray-400"><?= htmlspecialchars($richiesta['freelancer_titolo']) ?></p>
                    </div>
                </div>
                <!-- Stato Badge -->
                <div>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-500 mr-1.5"></span>
                        Richiesta Accettata
                    </span>
                </div>
            </div>

            <!-- Box Messaggi -->
            <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50/50">
                <?php foreach($messaggi as $msg): ?>
                    <?php $isMe = ($msg['ruolo_mittente'] === 'Cliente'); ?>
                    <div class="flex <?= $isMe ? 'justify-end' : 'justify-start' ?>">
                        <div class="max-w-[75%] rounded-2xl px-4 py-3 text-sm shadow-sm <?= $isMe ? 'bg-primary-600 text-white rounded-tr-none' : 'bg-white text-gray-800 border border-gray-200 rounded-tl-none' ?>">
                            <p class="font-bold text-[10px] mb-1 opacity-75"><?= htmlspecialchars($msg['mittente']) ?></p>
                            <p class="leading-normal"><?= htmlspecialchars($msg['testo']) ?></p>
                            <span class="block text-right text-[9px] mt-1 opacity-60 font-semibold"><?= htmlspecialchars($msg['data']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Input Form Invio -->
            <div class="p-4 border-t border-gray-200 bg-white">
                <form action="" method="POST" class="flex space-x-3">
                    <input type="text" placeholder="Scrivi un messaggio per discutere i dettagli..." 
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                    <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white p-3 rounded-xl transition shadow-md shadow-primary-500/15">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar Info Pacchetto / Pagamento (1 colonna) -->
        <div class="hidden lg:flex flex-col border-l border-gray-200 p-6 h-full bg-gray-50/20 overflow-y-auto space-y-6">
            <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider pb-3 border-b border-gray-200">Dettagli Accordo</h3>
            
            <div class="space-y-4">
                <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm space-y-2">
                    <span class="text-[10px] text-primary-600 bg-primary-50 px-2 py-0.5 rounded-full font-bold">Pacchetto</span>
                    <h4 class="font-bold text-sm text-gray-900"><?= htmlspecialchars($richiesta['pacchetto_titolo']) ?></h4>
                    <p class="text-xs text-gray-500">Consegna in <?= $richiesta['giorni_consegna'] ?> giorni</p>
                </div>

                <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm flex justify-between items-center">
                    <span class="text-xs text-gray-500 font-bold">Importo Concordato</span>
                    <span class="text-lg font-extrabold text-primary-600">€ <?= number_format($richiesta['prezzo'], 2, ',', '.') ?></span>
                </div>
            </div>

            <?php if($richiesta['stato'] === 'Accettata'): ?>
                <div class="bg-primary-50 border border-primary-200 rounded-xl p-4 space-y-3">
                    <h4 class="text-xs font-bold text-primary-900"><i class="fa-solid fa-circle-check text-primary-600 mr-1.5"></i>Pronto per l'avvio</h4>
                    <p class="text-[11px] text-primary-700 leading-normal">
                        Il freelancer ha accettato la richiesta! Clicca sotto per procedere al pagamento simulato ed avviare ufficialmente l'ordine.
                    </p>
                    <a href="/ProgettoPersonale/views/client/checkout.php?id=<?= $richiesta['id'] ?>" 
                       class="block w-full text-center bg-success-500 hover:bg-success-600 text-white font-bold py-2.5 rounded-lg text-xs shadow-md shadow-success-500/10 transition">
                        Procedi al Pagamento
                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
