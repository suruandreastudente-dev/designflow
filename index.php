<?php
/**
 * DesignFlow - Front Controller / Router
 */

// Autoload delle dipendenze di Composer
require_once __DIR__ . '/vendor/autoload.php';

// Inclusione delle classi del backend
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/utils/JwtHandler.php';
require_once __DIR__ . '/models/Utente.php';
require_once __DIR__ . '/controllers/AuthController.php';

// ============================================================================
// GESTIONE CORS (Cross-Origin Resource Sharing)
// ============================================================================
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// Gestione preflight request OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// ============================================================================
// ROUTING DI BASE
// ============================================================================
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
$basePath = '/ProgettoPersonale';

// 1. Rimuove il base path dall'URI (es. /ProgettoPersonale)
if (strpos($requestUri, $basePath) === 0) {
    $requestUri = substr($requestUri, strlen($basePath));
}

// 2. IL FIX: Rimuove '/index.php' dall'URI per far funzionare lo switch
if (strpos($requestUri, '/index.php') === 0) {
    $requestUri = substr($requestUri, strlen('/index.php'));
}

// 3. Normalizza l'URI se è rimasto vuoto (es. se l'utente visita la root)
if (empty($requestUri)) {
    $requestUri = '/';
}

switch ($requestUri) {
    case '/':
        // Carica la home page pubblica
        header("Content-Type: text/html; charset=UTF-8");
        // Verifica che il file esista prima di caricarlo, per evitare fatal error
        $homePath = __DIR__ . '/views/public/home.php';
        if (file_exists($homePath)) {
            require_once $homePath;
        } else {
            echo "Benvenuto in Design Flow! (File view non ancora creato)";
        }
        break;

    case '/api/test':
        try {
            $db = new Database();
            $conn = $db->getConnection();
            
            echo json_encode([
                "status" => "success",
                "message" => "Connessione al database stabilita con successo tramite PDO."
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                "status" => "error",
                "message" => "Impossibile connettersi al database: " . $e->getMessage()
            ]);
        }
        break;

    case '/api/login':
        // Accettiamo solo richieste in POST per la sicurezza delle password
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["status" => "error", "message" => "Metodo non consentito. Usa POST."]);
            break;
        }

        try {
            // Prepariamo la connessione e passiamo la palla al Controller
            $database = new Database();
            $dbConnection = $database->getConnection();
            
            $authController = new AuthController($dbConnection);
            $authController->login();
            
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                "status" => "error",
                "message" => "Errore interno del server: " . $e->getMessage()
            ]);
        }
        break;

    case '/api/register':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["status" => "error", "message" => "Metodo non consentito. Usa POST."]);
            break;
        }
        try {
            $database = new Database();
            $dbConnection = $database->getConnection();
            
            $authController = new AuthController($dbConnection);
            $authController->register();
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                "status" => "error",
                "message" => "Errore interno: " . $e->getMessage()
            ]);
        }
        break;

    case '/api/logout':
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: /ProgettoPersonale/index.php");
        exit();
        break;

    default:
        // Se la rotta non esiste, restituisce 404 stampando l'URI cercato per comodità di debug
        http_response_code(404);
        echo json_encode([
            "status" => "error",
            "message" => "Rotta non trovata: " . $requestUri
        ]);
        break;
}