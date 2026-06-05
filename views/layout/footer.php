    <!-- Footer Globale -->
    <footer class="bg-slate-900 text-slate-400 mt-auto border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Info Brand -->
                <div class="space-y-4 col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2">
                        <div class="h-8 w-8 rounded-lg bg-primary-500 flex items-center justify-center text-white">
                            <i class="fa-solid fa-wind text-sm"></i>
                        </div>
                        <span class="text-lg font-bold text-white tracking-tight">Design Flow</span>
                    </div>
                    <p class="text-sm text-slate-400 max-w-sm">
                        Il marketplace decentralizzato per connettere talenti digitali e progetti ambiziosi con il modello sicuro "Richiedi prima, paga poi".
                    </p>
                </div>

                <!-- Link Rapidi -->
                <div>
                    <h3 class="text-xs font-semibold text-slate-200 uppercase tracking-wider mb-4">Piattaforma</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/ProgettoPersonale/views/public/catalogo.php" class="hover:text-white transition">Esplora Catalogo</a></li>
                        <li><a href="/ProgettoPersonale/views/auth/login.php" class="hover:text-white transition">Accedi</a></li>
                        <li><a href="/ProgettoPersonale/views/auth/register.php" class="hover:text-white transition">Registrati</a></li>
                    </ul>
                </div>

                <!-- Supporto -->
                <div>
                    <h3 class="text-xs font-semibold text-slate-200 uppercase tracking-wider mb-4">Supporto</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Centro Assistenza</a></li>
                        <li><a href="#" class="hover:text-white transition">Linee Guida Sicurezza</a></li>
                        <li><a href="#" class="hover:text-white transition">Termini di Servizio</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500">
                <p>&copy; <?= date('Y') ?> Design Flow Marketplace. Tutti i diritti riservati.</p>
                <div class="flex space-x-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-slate-300"><i class="fa-brands fa-twitter text-base"></i></a>
                    <a href="#" class="hover:text-slate-300"><i class="fa-brands fa-facebook text-base"></i></a>
                    <a href="#" class="hover:text-slate-300"><i class="fa-brands fa-linkedin text-base"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
