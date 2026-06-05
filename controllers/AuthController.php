<?php
// Controller per la gestione dell'autenticazione

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Utente.php';
require_once __DIR__ . '/../utils/JwtHandler.php';

class AuthController {
    private $db;
    private $utenteModel;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
        $this->utenteModel = new Utente($this->db);
    }

    /**
     * Gestisce la richiesta di login dell'utente (POST /api/login)
     */
    public function login() {
        // Rileva se è una richiesta da form HTML tradizionale o JSON
        $isFormSubmit = !empty($_POST) || (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/x-www-form-urlencoded') !== false);

        $input = [];
        if ($isFormSubmit && !empty($_POST)) {
            $input = $_POST;
        } else {
            $input = json_decode(file_get_contents("php://input"), true) ?? [];
        }

        $email = isset($input['email']) ? trim($input['email']) : '';
        $password = isset($input['password']) ? $input['password'] : '';

        // Validazione parametri obbligatori
        if (empty($email) || empty($password)) {
            $errorMsg = "Dati di login incompleti. Email e password sono obbligatorie.";
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/login.php?error=" . urlencode($errorMsg));
                exit();
            } else {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => $errorMsg]);
                return;
            }
        }

        // Cerca l'utente per email
        $user = $this->utenteModel->findByEmail($email);
        if (!$user) {
            $errorMsg = "Credenziali non valide.";
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/login.php?error=" . urlencode($errorMsg));
                exit();
            } else {
                http_response_code(401);
                echo json_encode(["status" => "error", "message" => $errorMsg]);
                return;
            }
        }

        // Verifica la password hashata
        if (!password_verify($password, $user['Password_Hash'])) {
            $errorMsg = "Credenziali non valide.";
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/login.php?error=" . urlencode($errorMsg));
                exit();
            } else {
                http_response_code(401);
                echo json_encode(["status" => "error", "message" => $errorMsg]);
                return;
            }
        }

        // Recupera i ruoli associati all'utente (RBAC)
        $roles = $this->utenteModel->getUserRoles($user['ID_Utente']);
        $mainRole = $roles[0] ?? 'Cliente';

        // Costruisce la sessione PHP nativa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = [
            "id" => $user['ID_Utente'],
            "nome" => $user['Nome'],
            "cognome" => $user['Cognome'],
            "email" => $user['Email'],
            "ruolo" => $mainRole,
            "ruoli" => $roles
        ];

        // Costruisce il payload per il JWT
        $payload = [
            "user_id" => $user['ID_Utente'],
            "email" => $user['Email'],
            "ruoli" => $roles
        ];

        try {
            // Genera il token JWT
            $token = JwtHandler::generateToken($payload);

            if ($isFormSubmit) {
                // Reindirizza alla dashboard in base al ruolo
                if ($mainRole === 'Admin') {
                    header("Location: /ProgettoPersonale/views/admin/dashboard_admin.php");
                } elseif ($mainRole === 'Freelancer') {
                    header("Location: /ProgettoPersonale/views/freelancer/dashboard_freelancer.php");
                } else {
                    header("Location: /ProgettoPersonale/views/client/dashboard_cliente.php");
                }
                exit();
            } else {
                http_response_code(200);
                echo json_encode([
                    "status" => "success",
                    "message" => "Benvenuto in Design Flow!",
                    "user" => [
                        "id" => $user['ID_Utente'],
                        "nome" => $user['Nome'],
                        "cognome" => $user['Cognome'],
                        "email" => $user['Email'],
                        "ruolo" => $mainRole,
                        "ruoli" => $roles
                    ],
                    "token" => $token
                ]);
            }
        } catch (Exception $e) {
            $errorMsg = "Errore interno durante il login: " . $e->getMessage();
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/login.php?error=" . urlencode($errorMsg));
                exit();
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => $errorMsg]);
            }
        }
    }

    /**
     * Gestisce la richiesta di registrazione di un nuovo utente (POST /api/register)
     */
    public function register() {
        // Rileva se è una richiesta da form HTML tradizionale o JSON
        $isFormSubmit = !empty($_POST) || (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/x-www-form-urlencoded') !== false);

        $input = [];
        if ($isFormSubmit && !empty($_POST)) {
            $input = $_POST;
        } else {
            $input = json_decode(file_get_contents("php://input"), true) ?? [];
        }

        $nome = isset($input['nome']) ? trim($input['nome']) : '';
        $cognome = isset($input['cognome']) ? trim($input['cognome']) : '';
        $email = isset($input['email']) ? trim($input['email']) : '';
        $password = isset($input['password']) ? $input['password'] : '';
        $ruolo = isset($input['ruolo']) ? trim($input['ruolo']) : 'cliente';

        // Validazione dei campi obbligatori
        if (empty($nome) || empty($cognome) || empty($email) || empty($password)) {
            $errorMsg = "Dati di registrazione incompleti. Nome, cognome, email e password sono obbligatori.";
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/register.php?error=" . urlencode($errorMsg));
                exit();
            } else {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => $errorMsg]);
                return;
            }
        }

        // Verifica se l'email esiste già
        if ($this->utenteModel->emailExists($email)) {
            $errorMsg = "Questo indirizzo email è già registrato.";
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/register.php?error=" . urlencode($errorMsg));
                exit();
            } else {
                http_response_code(409); // Conflict
                echo json_encode(["status" => "error", "message" => $errorMsg]);
                return;
            }
        }

        // Cifra la password con l'algoritmo bcrypt nativo
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Esegue la registrazione
        $idNuovoUtente = $this->utenteModel->register($nome, $cognome, $email, $hash);

        if ($idNuovoUtente) {
            // Determina il ruolo da assegnare
            $roleName = ($ruolo === 'freelancer') ? 'Freelancer' : 'Cliente';
            
            // Assegna il ruolo
            $this->utenteModel->assignDefaultRole($idNuovoUtente, $roleName);

            // Se il ruolo è Freelancer, crea anche il record in PROFILO_FREELANCER
            if ($roleName === 'Freelancer') {
                $this->utenteModel->createFreelancerProfile($idNuovoUtente, 'Freelancer Creativo', 'Completa il tuo profilo inserendo una biografia.');
            }

            $successMsg = "Utente registrato con successo. Ora puoi effettuare il login.";
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/login.php?msg=" . urlencode($successMsg));
                exit();
            } else {
                http_response_code(201); // Created
                echo json_encode([
                    "status" => "success",
                    "message" => $successMsg
                ]);
            }
        } else {
            $errorMsg = "Si è verificato un errore durante il salvataggio dei dati utente.";
            if ($isFormSubmit) {
                header("Location: /ProgettoPersonale/views/auth/register.php?error=" . urlencode($errorMsg));
                exit();
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => $errorMsg]);
            }
        }
    }
}
