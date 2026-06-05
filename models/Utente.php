<?php
// Modello per l'utente (User / RBAC)

class Utente {
    private $conn;
    private $table_name = "UTENTE";

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Trova un utente tramite il suo indirizzo email
     * @param string $email
     * @return array|false
     */
    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Email = :email LIMIT 0,1";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            $row = $stmt->fetch();
            if ($row) {
                return $row;
            }
            return false;
        } catch (PDOException $e) {
            error_log("Errore findByEmail: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Ritorna i ruoli associati all'utente
     * @param int $id_utente
     * @return array
     */
    public function getUserRoles($id_utente) {
        $query = "SELECT r.Nome_Ruolo FROM RUOLO r JOIN UTENTE_RUOLO ur ON r.ID_Ruolo = ur.ID_Ruolo WHERE ur.ID_Utente = :id";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id_utente, PDO::PARAM_INT);
            $stmt->execute();
            
            $roles = [];
            while ($row = $stmt->fetch()) {
                $roles[] = $row['Nome_Ruolo'];
            }
            return $roles;
        } catch (PDOException $e) {
            error_log("Errore getUserRoles: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Verifica se un indirizzo email è già registrato nel database
     * @param string $email
     * @return bool
     */
    public function emailExists($email) {
        $query = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE Email = :email";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Errore emailExists: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Registra un nuovo utente nel database
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $passwordHash
     * @return int|false L'ID del nuovo utente o false
     */
    public function register($nome, $cognome, $email, $passwordHash) {
        $query = "INSERT INTO " . $this->table_name . " (Nome, Cognome, Email, Password_Hash) VALUES (:nome, :cognome, :email, :hash)";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':cognome', $cognome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':hash', $passwordHash, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            }
            return false;
        } catch (PDOException $e) {
            error_log("Errore register: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Assegna un ruolo predefinito ad un utente
     * @param int $idUtente
     * @param string $nomeRuolo
     * @return bool
     */
    public function assignDefaultRole($idUtente, $nomeRuolo = 'Cliente') {
        // Cerca l'ID del ruolo dal nome
        $queryRole = "SELECT ID_Ruolo FROM RUOLO WHERE Nome_Ruolo = :nome_ruolo LIMIT 1";
        
        try {
            $stmtRole = $this->conn->prepare($queryRole);
            $stmtRole->bindParam(':nome_ruolo', $nomeRuolo, PDO::PARAM_STR);
            $stmtRole->execute();
            
            $role = $stmtRole->fetch();
            if (!$role) {
                error_log("Errore assignDefaultRole: Ruolo '$nomeRuolo' non trovato.");
                return false;
            }
            
            $idRuolo = $role['ID_Ruolo'];
            
            // Associa l'utente al ruolo
            $queryAssign = "INSERT INTO UTENTE_RUOLO (ID_Utente, ID_Ruolo) VALUES (:id_utente, :id_ruolo)";
            $stmtAssign = $this->conn->prepare($queryAssign);
            $stmtAssign->bindParam(':id_utente', $idUtente, PDO::PARAM_INT);
            $stmtAssign->bindParam(':id_ruolo', $idRuolo, PDO::PARAM_INT);
            
            return $stmtAssign->execute();
        } catch (PDOException $e) {
            error_log("Errore assignDefaultRole: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Crea un profilo freelancer associato a un utente
     * @param int $idUtente
     * @param string $titolo
     * @param string $biografia
     * @return bool
     */
    public function createFreelancerProfile($idUtente, $titolo = 'Freelancer Creativo', $biografia = '') {
        $query = "INSERT INTO PROFILO_FREELANCER (ID_Utente, Titolo_Professionale, Biografia) VALUES (:id_utente, :titolo, :biografia)";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_utente', $idUtente, PDO::PARAM_INT);
            $stmt->bindParam(':titolo', $titolo, PDO::PARAM_STR);
            $stmt->bindParam(':biografia', $biografia, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Errore createFreelancerProfile: " . $e->getMessage());
            return false;
        }
    }
}
