<?php
/**
 * ValidatorTest - Classe di test unitari per verificare Validator.
 * Estende TestCase fornito da PHPUnit.
 * Progettata a scopo didattico.
 */

// Includiamo il file contenente la classe da testare
require_once __DIR__ . '/../utils/Validator.php';

use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase {

    /**
     * Test con una password valida che soddisfa tutti i requisiti.
     * Ci si aspetta che Validator::isPasswordStrong ritorni true.
     */
    public function testPasswordValida() {
        // Valore di test
        $password = "Sicura123!";
        
        // Esecuzione del metodo sotto test
        $risultato = Validator::isPasswordStrong($password);
        
        // Asserzione: ci aspettiamo che il risultato reale sia true
        $this->assertTrue($risultato, "La password 'Sicura123!' dovrebbe essere considerata sicura.");
    }

    /**
     * Test con una password troppo corta (meno di 8 caratteri).
     * Ci si aspetta che Validator::isPasswordStrong ritorni false.
     */
    public function testPasswordTroppoCorta() {
        // Valore di test (solo 5 caratteri)
        $password = "Pass1";
        
        // Esecuzione del metodo sotto test
        $risultato = Validator::isPasswordStrong($password);
        
        // Asserzione: ci aspettiamo che il risultato reale sia false
        $this->assertFalse($risultato, "La password 'Pass1' è troppo corta e dovrebbe fallire.");
    }

    /**
     * Test con una password lunga e con lettere maiuscole, ma senza cifre numeriche.
     * Ci si aspetta che Validator::isPasswordStrong ritorni false.
     */
    public function testPasswordSenzaNumeri() {
        // Valore di test (manca il numero)
        $password = "SoloLettereMaiuscole";
        
        // Esecuzione del metodo sotto test
        $risultato = Validator::isPasswordStrong($password);
        
        // Asserzione: ci aspettiamo che il risultato reale sia false
        $this->assertFalse($risultato, "La password 'SoloLettereMaiuscole' non ha numeri e dovrebbe fallire.");
    }

    /**
     * Test con una password lunga e con numeri, ma priva di lettere maiuscole.
     * Ci si aspetta che Validator::isPasswordStrong ritorni false.
     */
    public function testPasswordSenzaMaiuscole() {
        // Valore di test (mancano le lettere maiuscole)
        $password = "tuttominuscolo123";
        
        // Esecuzione del metodo sotto test
        $risultato = Validator::isPasswordStrong($password);
        
        // Asserzione: ci aspettiamo che il risultato reale sia false
        $this->assertFalse($risultato, "La password 'tuttominuscolo123' non ha lettere maiuscole e dovrebbe fallire.");
    }
}
