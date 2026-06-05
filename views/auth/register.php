<!DOCTYPE html>
<html lang="it" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati | Design Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        },
                        success: {
                            500: '#10b981',
                            600: '#059669',
                            50: '#f0fdf4'
                        }
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 via-gray-50 to-primary-50">
    <div class="max-w-xl w-full space-y-8 bg-white p-8 sm:p-10 border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50">
        <div class="text-center">
            <a href="/ProgettoPersonale/index.php" class="inline-flex items-center space-x-2 mb-6">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-primary-500 to-indigo-700 flex items-center justify-center text-white shadow-md shadow-primary-500/20">
                    <i class="fa-solid fa-wind text-lg"></i>
                </div>
                <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-primary-600 to-indigo-800 bg-clip-text text-transparent">Design Flow.</span>
            </a>
            <h2 class="text-2xl font-extrabold text-gray-900">Unisciti al marketplace</h2>
            <p class="mt-2 text-sm text-gray-500 font-medium">
                Crea il tuo profilo in meno di un minuto.
            </p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm flex items-center space-x-2">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= htmlspecialchars($_GET['error']) ?></span>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['msg'])): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm flex items-center space-x-2">
                <i class="fa-solid fa-circle-check"></i>
                <span><?= htmlspecialchars($_GET['msg']) ?></span>
            </div>
        <?php endif; ?>
        
        <form class="mt-8 space-y-6" action="/ProgettoPersonale/index.php/api/register" method="POST">
            <!-- Role Selector -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3 text-center">Come utilizzerai la piattaforma?</label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="relative border-2 border-gray-200 rounded-2xl p-4 flex flex-col items-center justify-center cursor-pointer hover:border-success-500 hover:bg-success-50 transition duration-300">
                        <input type="radio" name="ruolo" value="cliente" class="sr-only peer" checked>
                        <i class="fa-solid fa-user-tie text-2xl text-gray-400 peer-checked:text-success-600 mb-2"></i>
                        <span class="text-sm font-bold text-gray-700">Voglio assumere</span>
                        <div class="absolute inset-0 border-2 border-transparent rounded-2xl peer-checked:border-success-600 pointer-events-none"></div>
                    </label>

                    <label class="relative border-2 border-gray-200 rounded-2xl p-4 flex flex-col items-center justify-center cursor-pointer hover:border-success-500 hover:bg-success-50 transition duration-300">
                        <input type="radio" name="ruolo" value="freelancer" class="sr-only peer">
                        <i class="fa-solid fa-laptop-code text-2xl text-gray-400 peer-checked:text-success-600 mb-2"></i>
                        <span class="text-sm font-bold text-gray-700">Voglio lavorare</span>
                        <div class="absolute inset-0 border-2 border-transparent rounded-2xl peer-checked:border-success-600 pointer-events-none"></div>
                    </label>
                </div>
            </div>

            <!-- Campi Registrazione -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nome</label>
                    <input type="text" name="nome" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Es. Mario">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Cognome</label>
                    <input type="text" name="cognome" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Es. Rossi">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Indirizzo Email</label>
                <input type="email" name="email" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="mario.rossi@email.com">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Crea una Password</label>
                <input type="password" name="password" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Almeno 8 caratteri">
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-success-500 hover:bg-success-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-success-500 transition shadow-lg shadow-success-500/20">
                    Crea il mio Account
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
                Hai già un account? 
                <a href="/ProgettoPersonale/views/auth/login.php" class="font-bold text-success-500 hover:text-success-600 transition">Accedi ora</a>
            </p>
        </div>
    </div>
    
    <!-- Script di simulazione visiva del selettore ruolo -->
    <script>
        document.querySelectorAll('input[name="ruolo"]').forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('input[name="ruolo"]').forEach(i => {
                    const icon = i.parentElement.querySelector('i');
                    const containerBorder = i.parentElement.querySelector('div');
                    if (i.checked) {
                        icon.classList.remove('text-gray-400');
                        icon.classList.add('text-success-600');
                        containerBorder.classList.remove('border-transparent');
                        containerBorder.classList.add('border-success-600');
                    } else {
                        icon.classList.add('text-gray-400');
                        icon.classList.remove('text-success-600');
                        containerBorder.classList.add('border-transparent');
                        containerBorder.classList.remove('border-success-600');
                    }
                });
            });
        });
    </script>
</body>
</html>
