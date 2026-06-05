<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Legge lo stato di autenticazione effettivo dalla sessione
$isLoggedIn = isset($_SESSION['user']);
$userRole = $isLoggedIn ? $_SESSION['user']['ruolo'] : ''; // 'Admin', 'Cliente', 'Freelancer'
$userName = $isLoggedIn ? $_SESSION['user']['nome'] . ' ' . $_SESSION['user']['cognome'] : '';
?>
<!DOCTYPE html>
<html lang="it" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | Design Flow' : 'Design Flow - Trova i migliori talenti freelance' ?></title>
    <!-- Tailwind CSS Play CDN -->
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
                        }
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts Outfit & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="h-full flex flex-col text-gray-800">

    <!-- Navbar Globale -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/ProgettoPersonale/index.php" class="flex items-center space-x-2">
                        <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-primary-500 to-indigo-700 flex items-center justify-center text-white shadow-md shadow-primary-500/20">
                            <i class="fa-solid fa-wind text-lg"></i>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-primary-600 to-indigo-800 bg-clip-text text-transparent">Design Flow.</span>
                    </a>
                </div>

                <!-- Barra di Ricerca Navbar (Visibile su Desktop) -->
                <div class="hidden md:flex flex-1 items-center justify-center px-8">
                    <div class="w-full max-w-lg relative">
                        <input type="text" placeholder="Quale servizio stai cercando oggi?" 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        <div class="absolute left-3.5 top-2.5 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Nav Links & Profile -->
                <div class="flex items-center space-x-4">
                    <a href="/ProgettoPersonale/views/public/catalogo.php" class="text-gray-600 hover:text-primary-600 font-medium text-sm transition">Esplora Servizi</a>
                    
                    <?php if ($isLoggedIn): ?>
                        <!-- Utente Loggato -->
                        <div class="h-6 w-px bg-gray-200"></div>
                        
                        <!-- Menu Ruolo Specifico -->
                        <?php if ($userRole === 'Admin'): ?>
                            <a href="/ProgettoPersonale/views/admin/dashboard_admin.php" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm transition"><i class="fa-solid fa-shield-halved mr-1"></i> Admin Panel</a>
                        <?php elseif ($userRole === 'Freelancer'): ?>
                            <a href="/ProgettoPersonale/views/freelancer/dashboard_freelancer.php" class="text-success-600 hover:text-success-700 font-semibold text-sm transition"><i class="fa-solid fa-briefcase mr-1"></i> Freelancer Panel</a>
                        <?php else: ?>
                            <a href="/ProgettoPersonale/views/client/dashboard_cliente.php" class="text-primary-600 hover:text-primary-700 font-semibold text-sm transition"><i class="fa-solid fa-circle-user mr-1"></i> Area Cliente</a>
                        <?php endif; ?>

                        <!-- Dropdown Profilo / Avatar -->
                        <div class="relative" id="profile-dropdown-container">
                            <button onclick="toggleDropdown()" class="flex items-center space-x-2 focus:outline-none">
                                <div class="h-9 w-9 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center font-bold text-sm border-2 border-primary-500/20 shadow-sm">
                                    <?= htmlspecialchars(substr($userName ?: 'U', 0, 2)) ?>
                                </div>
                                <span class="hidden sm:inline text-sm font-medium text-gray-700"><?= htmlspecialchars($userName) ?></span>
                                <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition-transform duration-200" id="dropdown-arrow"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg py-1 z-50">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-xs text-gray-400">Loggato come</p>
                                    <p class="text-sm font-semibold text-gray-800 truncate"><?= htmlspecialchars($userRole) ?></p>
                                </div>
                                <a href="/ProgettoPersonale/index.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><i class="fa-solid fa-house mr-2 text-gray-400"></i> Home</a>
                                <div class="border-t border-gray-100"></div>
                                <a href="/ProgettoPersonale/index.php/api/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"><i class="fa-solid fa-arrow-right-from-bracket mr-2 text-red-400"></i> Esci</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Ospite -->
                        <a href="/ProgettoPersonale/views/auth/login.php" class="text-gray-600 hover:text-primary-600 font-medium text-sm transition">Accedi</a>
                        <a href="/ProgettoPersonale/views/auth/register.php" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2 rounded-full font-medium text-sm transition shadow-md shadow-primary-500/10">Registrati</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Script Dropdown Profilo -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            const arrow = document.getElementById('dropdown-arrow');
            if (dropdown) {
                dropdown.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            }
        }
        
        // Chiudi dropdown al click esterno
        window.addEventListener('click', function(e) {
            const container = document.getElementById('profile-dropdown-container');
            const dropdown = document.getElementById('profile-dropdown');
            const arrow = document.getElementById('dropdown-arrow');
            if (container && !container.contains(e.target) && dropdown && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
                arrow.classList.remove('rotate-180');
            }
        });
    </script>
