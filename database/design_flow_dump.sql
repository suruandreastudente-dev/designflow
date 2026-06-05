CREATE DATABASE IF NOT EXISTS design_flow;
USE design_flow;

-- ============================================================================
-- RIMOZIONE DELLE TABELLE ESISTENTI (Ordine Gerarchico Inverso per FK)
-- ============================================================================

DROP TABLE IF EXISTS RECENSIONE;
DROP TABLE IF EXISTS TRANSAZIONE;
DROP TABLE IF EXISTS MESSAGGIO;
DROP TABLE IF EXISTS ORDINE;
DROP TABLE IF EXISTS RICHIESTA;
DROP TABLE IF EXISTS PACCHETTO;
DROP TABLE IF EXISTS PROFILO_FREELANCER;
DROP TABLE IF EXISTS CATEGORIA;
DROP TABLE IF EXISTS RUOLO_PERMESSO;
DROP TABLE IF EXISTS UTENTE_RUOLO;
DROP TABLE IF EXISTS PERMESSO;
DROP TABLE IF EXISTS RUOLO;
DROP TABLE IF EXISTS UTENTE;

-- ============================================================================
-- BLOCCO 1: Utenti e Sicurezza (RBAC)
-- ============================================================================

-- Tabella UTENTE
CREATE TABLE UTENTE (
    ID_Utente INT AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Cognome VARCHAR(100) NOT NULL,
    Email VARCHAR(150) UNIQUE NOT NULL,
    Password_Hash VARCHAR(255) NOT NULL,
    Refresh_Token VARCHAR(255) NULL,
    Data_Registrazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID_Utente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella RUOLO
CREATE TABLE RUOLO (
    ID_Ruolo INT AUTO_INCREMENT,
    Nome_Ruolo VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (ID_Ruolo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella PERMESSO
CREATE TABLE PERMESSO (
    ID_Permesso INT AUTO_INCREMENT,
    Codice_Permesso VARCHAR(100) UNIQUE NOT NULL,
    PRIMARY KEY (ID_Permesso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella associativa UTENTE_RUOLO
CREATE TABLE UTENTE_RUOLO (
    ID_Utente INT,
    ID_Ruolo INT,
    PRIMARY KEY (ID_Utente, ID_Ruolo),
    CONSTRAINT FK_UtenteRuolo_Utente FOREIGN KEY (ID_Utente)
        REFERENCES UTENTE (ID_Utente) ON DELETE CASCADE,
    CONSTRAINT FK_UtenteRuolo_Ruolo FOREIGN KEY (ID_Ruolo)
        REFERENCES RUOLO (ID_Ruolo) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella associativa RUOLO_PERMESSO
CREATE TABLE RUOLO_PERMESSO (
    ID_Ruolo INT,
    ID_Permesso INT,
    PRIMARY KEY (ID_Ruolo, ID_Permesso),
    CONSTRAINT FK_RuoloPermesso_Ruolo FOREIGN KEY (ID_Ruolo)
        REFERENCES RUOLO (ID_Ruolo) ON DELETE CASCADE,
    CONSTRAINT FK_RuoloPermesso_Permesso FOREIGN KEY (ID_Permesso)
        REFERENCES PERMESSO (ID_Permesso) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- BLOCCO 2: Catalogo (Multi-Tenant Logico)
-- ============================================================================

-- Tabella CATEGORIA
CREATE TABLE CATEGORIA (
    ID_Categoria INT AUTO_INCREMENT,
    Nome VARCHAR(100) UNIQUE NOT NULL,
    Descrizione TEXT NULL,
    PRIMARY KEY (ID_Categoria)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella PROFILO_FREELANCER
CREATE TABLE PROFILO_FREELANCER (
    ID_Freelancer INT AUTO_INCREMENT,
    ID_Utente INT UNIQUE NOT NULL,
    Titolo_Professionale VARCHAR(150) NOT NULL,
    Biografia TEXT NULL,
    PRIMARY KEY (ID_Freelancer),
    CONSTRAINT FK_ProfiloFreelancer_Utente FOREIGN KEY (ID_Utente)
        REFERENCES UTENTE (ID_Utente) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella PACCHETTO
CREATE TABLE PACCHETTO (
    ID_Pacchetto INT AUTO_INCREMENT,
    ID_Freelancer INT NOT NULL,
    ID_Categoria INT NOT NULL,
    Titolo VARCHAR(150) NOT NULL,
    Descrizione TEXT NOT NULL,
    Prezzo_Base DECIMAL(10,2) NOT NULL,
    Giorni_Consegna INT NOT NULL,
    PRIMARY KEY (ID_Pacchetto),
    CONSTRAINT FK_Pacchetto_Freelancer FOREIGN KEY (ID_Freelancer)
        REFERENCES PROFILO_FREELANCER (ID_Freelancer) ON DELETE RESTRICT,
    CONSTRAINT FK_Pacchetto_Categoria FOREIGN KEY (ID_Categoria)
        REFERENCES CATEGORIA (ID_Categoria) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- BLOCCO 3: Business Logic (Richiedi prima, paga poi)
-- ============================================================================

-- Tabella RICHIESTA
CREATE TABLE RICHIESTA (
    ID_Richiesta INT AUTO_INCREMENT,
    ID_Utente INT NOT NULL, -- Cliente
    ID_Pacchetto INT NOT NULL,
    Messaggio_Iniziale TEXT NOT NULL,
    Stato ENUM('In Attesa', 'Accettata', 'Rifiutata') DEFAULT 'In Attesa',
    Data_Invio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID_Richiesta),
    CONSTRAINT FK_Richiesta_Utente FOREIGN KEY (ID_Utente)
        REFERENCES UTENTE (ID_Utente) ON DELETE RESTRICT,
    CONSTRAINT FK_Richiesta_Pacchetto FOREIGN KEY (ID_Pacchetto)
        REFERENCES PACCHETTO (ID_Pacchetto) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella ORDINE
CREATE TABLE ORDINE (
    ID_Ordine INT AUTO_INCREMENT,
    ID_Richiesta INT UNIQUE NOT NULL,
    Prezzo_Finale DECIMAL(10,2) NOT NULL,
    Stato ENUM('Da Pagare', 'In Lavorazione', 'Completato') DEFAULT 'Da Pagare',
    Scadenza DATE NOT NULL,
    Immagine_Consegna VARCHAR(255) NULL,
    Mostra_Portfolio BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (ID_Ordine),
    CONSTRAINT FK_Ordine_Richiesta FOREIGN KEY (ID_Richiesta)
        REFERENCES RICHIESTA (ID_Richiesta) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella MESSAGGIO
CREATE TABLE MESSAGGIO (
    ID_Messaggio INT AUTO_INCREMENT,
    ID_Richiesta INT NOT NULL,
    ID_Utente INT NOT NULL, -- Mittente
    Testo TEXT NOT NULL,
    Data_Invio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID_Messaggio),
    CONSTRAINT FK_Messaggio_Richiesta FOREIGN KEY (ID_Richiesta)
        REFERENCES RICHIESTA (ID_Richiesta) ON DELETE CASCADE,
    CONSTRAINT FK_Messaggio_Utente FOREIGN KEY (ID_Utente)
        REFERENCES UTENTE (ID_Utente) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella TRANSAZIONE
CREATE TABLE TRANSAZIONE (
    ID_Transazione INT AUTO_INCREMENT,
    ID_Ordine INT UNIQUE NOT NULL,
    Importo DECIMAL(10,2) NOT NULL,
    Stato_Pagamento ENUM('Completato', 'Fallito', 'Rimborsato') DEFAULT 'Fallito',
    Data_Pagamento TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ID_Transazione),
    CONSTRAINT FK_Transazione_Ordine FOREIGN KEY (ID_Ordine)
        REFERENCES ORDINE (ID_Ordine) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella RECENSIONE
CREATE TABLE RECENSIONE (
    ID_Recensione INT AUTO_INCREMENT,
    ID_Ordine INT UNIQUE NOT NULL,
    Voto INT NOT NULL CHECK (Voto >= 1 AND Voto <= 5),
    Commento TEXT NULL,
    Data_Recensione TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID_Recensione),
    CONSTRAINT FK_Recensione_Ordine FOREIGN KEY (ID_Ordine)
        REFERENCES ORDINE (ID_Ordine) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- INSERIMENTO DATI DI TEST (DML)
-- ============================================================================

-- 1. Ruoli base
INSERT INTO RUOLO (ID_Ruolo, Nome_Ruolo) VALUES
(1, 'Admin'),
(2, 'Cliente'),
(3, 'Freelancer');

-- 2. Permessi base
INSERT INTO PERMESSO (ID_Permesso, Codice_Permesso) VALUES
(1, 'login_base'),
(2, 'modera_sito'),
(3, 'crea_pacchetto'),
(4, 'compra_pacchetto');

-- 3. Associazione Ruoli e Permessi
INSERT INTO RUOLO_PERMESSO (ID_Ruolo, ID_Permesso) VALUES
(1, 1), -- Admin ha login_base
(1, 2), -- Admin ha modera_sito
(2, 1), -- Cliente ha login_base
(2, 4), -- Cliente ha compra_pacchetto
(3, 1), -- Freelancer ha login_base
(3, 3); -- Freelancer ha crea_pacchetto

-- 4. Utenti base con bcrypt hash fittizio standard (Tutti impostati con password: 'password')
INSERT INTO UTENTE (ID_Utente, Nome, Cognome, Email, Password_Hash, Refresh_Token, Data_Registrazione) VALUES
(1, 'Mario', 'Rossi', 'admin@test.com', '$2y$10$4gJcburSRfbCamTlplP1UePHq294.XmggcT1nZuO8a84kRJn/osTC', NULL, '2026-05-01 09:00:00'),
(2, 'Luigi', 'Verdi', 'cliente@test.com', '$2y$10$4gJcburSRfbCamTlplP1UePHq294.XmggcT1nZuO8a84kRJn/osTC', NULL, '2026-05-02 10:15:00'),
(3, 'Giulia', 'Bianchi', 'freelancer@test.com', '$2y$10$4gJcburSRfbCamTlplP1UePHq294.XmggcT1nZuO8a84kRJn/osTC', NULL, '2026-05-03 11:30:00');

-- 5. Associazione Utenti ai Ruoli
INSERT INTO UTENTE_RUOLO (ID_Utente, ID_Ruolo) VALUES
(1, 1), -- Mario Rossi è Admin
(2, 2), -- Luigi Verdi è Cliente
(3, 3); -- Giulia Bianchi è Freelancer

-- 6. Categorie di servizi
INSERT INTO CATEGORIA (ID_Categoria, Nome, Descrizione) VALUES
(1, 'Sviluppo Web', 'Creazione di siti web, e-commerce, web application su misura e supporto tecnico.'),
(2, 'Graphic Design', 'Creazione di loghi, brand identity, grafiche pubblicitarie e design di interfacce.');

-- 7. Profilo Freelancer per Giulia Bianchi
INSERT INTO PROFILO_FREELANCER (ID_Freelancer, ID_Utente, Titolo_Professionale, Biografia) VALUES
(1, 3, 'Senior Web Developer', 'Sviluppatrice web con oltre 8 anni di esperienza specializzata in e-commerce PHP e Laravel.');

-- 8. Pacchetto offerto da Giulia Bianchi
INSERT INTO PACCHETTO (ID_Pacchetto, ID_Freelancer, ID_Categoria, Titolo, Descrizione, Prezzo_Base, Giorni_Consegna) VALUES
(1, 1, 1, 'Sito E-commerce chiavi in mano', 'Soluzione e-commerce completa con carrello, area utente, gestione ordini, pannello di controllo e integrazione pagamenti.', 500.00, 14);

-- 9. Richiesta inviata dal cliente (Luigi Verdi) per il pacchetto di Giulia
INSERT INTO RICHIESTA (ID_Richiesta, ID_Utente, ID_Pacchetto, Messaggio_Iniziale, Stato, Data_Invio) VALUES
(1, 2, 1, 'Ciao Giulia, mi serve un sito per il mio negozio di scarpe', 'Accettata', '2026-06-01 10:00:00');

-- 10. Messaggi all'interno della richiesta
INSERT INTO MESSAGGIO (ID_Messaggio, ID_Richiesta, ID_Utente, Testo, Data_Invio) VALUES
(1, 1, 2, 'Hai bisogno delle foto dei prodotti prima di iniziare?', '2026-06-01 10:05:00'),
(2, 1, 3, 'Sì esatto, mandamele qui. Intanto accetto la richiesta così puoi procedere al pagamento.', '2026-06-01 10:15:00');

-- 11. Ordine generato a seguito della richiesta
INSERT INTO ORDINE (ID_Ordine, ID_Richiesta, Prezzo_Finale, Stato, Scadenza, Immagine_Consegna, Mostra_Portfolio) VALUES
(1, 1, 500.00, 'Completato', '2026-06-15', 'scarpe_shop.jpg', TRUE);

-- 12. Transazione per il pagamento dell'ordine (2 giorni dopo la richiesta)
INSERT INTO TRANSAZIONE (ID_Transazione, ID_Ordine, Importo, Stato_Pagamento, Data_Pagamento) VALUES
(1, 1, 500.00, 'Completato', '2026-06-03 11:30:00');

-- 13. Recensione dell'ordine completato rilasciata dal cliente (15 giorni dopo l'ordine/pagamento)
INSERT INTO RECENSIONE (ID_Recensione, ID_Ordine, Voto, Commento, Data_Recensione) VALUES
(1, 1, 5, 'Lavoro eccezionale e veloce!', '2026-06-18 16:00:00');
