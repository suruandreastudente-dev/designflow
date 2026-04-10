<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesignStudio | Home</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Stili Personalizzati e Proporzioni Moderne */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9; /* Sfondo neutro chiaro */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Assicura che il footer stia sempre in basso */
        }

        /* Gradiente Moderno per Navbar e Footer */
        .bg-gradient-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Stile Navbar */
        .navbar {
            padding: 1rem 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .nav-link {
            font-weight: 500;
            margin: 0 10px;
            transition: opacity 0.3s ease;
        }
        .nav-link:hover {
            opacity: 0.8;
        }

        /* Pulsanti personalizzati */
        .btn-modern-outline {
            border: 2px solid white;
            color: white;
            border-radius: 30px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-modern-outline:hover {
            background-color: white;
            color: #764ba2;
        }
        .btn-modern-solid {
            background-color: white;
            color: #764ba2;
            border-radius: 30px;
            padding: 8px 24px;
            font-weight: 600;
            border: 2px solid white;
            transition: all 0.3s ease;
        }
        .btn-modern-solid:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,255,255,0.3);
        }

        /* Sezione Hero (Contenuto Principale) */
        .hero-section {
            flex: 1; /* Occupa lo spazio rimanente */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 4rem 2rem;
        }
        .hero-card {
            background: white;
            padding: 4rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            max-width: 800px;
            width: 100%;
        }
        .hero-title {
            font-weight: 700;
            font-size: 3rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }
        .hero-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        /* Footer */
        footer {
            padding: 2rem 0;
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">DesignStudio.</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Area Personale</a>
                    </li>
                </ul>
                <div class="d-flex gap-3 mt-3 mt-lg-0">
                    <a href="#" class="btn btn-modern-outline text-decoration-none">Accedi</a>
                    <a href="#" class="btn btn-modern-solid text-decoration-none">Registrati</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="hero-section">
        <div class="hero-card">
            <h1 class="hero-title">Ridefinisci il tuo spazio.</h1>
            <p class="hero-subtitle">Esplora il nostro catalogo esclusivo e trasforma le tue idee in un design tangibile. Registrati per sbloccare l'area personale e salvare i tuoi progetti preferiti.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="#" class="btn btn-dark rounded-pill px-4 py-2" style="font-weight: 500;">Esplora il Catalogo</a>
                <a href="#" class="btn btn-outline-dark rounded-pill px-4 py-2" style="font-weight: 500;">Scopri di più</a>
            </div>
        </div>
    </main>

    <footer class="bg-gradient-custom text-center">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> DesignStudio. Tutti i diritti riservati.</p>
            <small>Creato con passione e codice.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>