<!DOCTYPE html>
<html lang="it" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accedi | Design Flow</title>
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
    <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50">
        <div class="text-center">
            <a href="/ProgettoPersonale/index.php" class="inline-flex items-center space-x-2 mb-6">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-primary-500 to-indigo-700 flex items-center justify-center text-white shadow-md shadow-primary-500/20">
                    <i class="fa-solid fa-wind text-lg"></i>
                </div>
                <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-primary-600 to-indigo-800 bg-clip-text text-transparent">Design Flow.</span>
            </a>
            <h2 class="text-2xl font-extrabold text-gray-900">Bentornato nel tuo account</h2>
            <p class="mt-2 text-sm text-gray-500">
                Inserisci le tue credenziali per accedere.
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
        
        <form class="mt-8 space-y-6" action="/ProgettoPersonale/index.php/api/login" method="POST">
            <div class="rounded-md space-y-4">
                <div>
                    <label for="email-address" class="block text-sm font-semibold text-gray-700 mb-1.5">Indirizzo Email</label>
                    <div class="relative">
                        <input id="email-address" name="email" type="email" autocomplete="email" required 
                               class="appearance-none block w-full px-4 py-3 pl-11 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" 
                               placeholder="es. mario@email.com">
                        <div class="absolute left-4 top-3.5 text-gray-400">
                            <i class="fa-solid fa-envelope text-sm"></i>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <a href="#" class="text-xs font-semibold text-primary-600 hover:text-primary-700">Dimenticata?</a>
                    </div>
                    <div class="relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                               class="appearance-none block w-full px-4 py-3 pl-11 border border-gray-300 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" 
                               placeholder="••••••••">
                        <div class="absolute left-4 top-3.5 text-gray-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2 text-gray-600 font-medium">
                    <input type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <span>Ricordami su questo dispositivo</span>
                </label>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition shadow-lg shadow-primary-500/20">
                    Accedi in Sicurezza
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
                Non hai ancora un account? 
                <a href="/ProgettoPersonale/views/auth/register.php" class="font-bold text-primary-600 hover:text-primary-700 transition">Registrati ora</a>
            </p>
        </div>
    </div>
</body>
</html>
