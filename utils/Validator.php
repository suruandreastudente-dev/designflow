<?php
/**
 * Classe Validator per l'applicazione Design Flow.
 * Contiene metodi di utilità per la validazione di input dell'utente.
 * Progettata a scopo didattico.
 */
class Validator {

    /**
     * Verifica se una password soddisfa i requisiti di sicurezza.
     * Regole di sicurezza verificate:
     * 1. Lunghezza minima di 8 caratteri
     * 2. Presenza di almeno una lettera maiuscola
     * 3. Presenza di almeno un numero
     *
     * @param string $password La password da verificare
     * @return bool Ritorna true se soddisfa tutti i requisiti, altrimenti false
     */
    public static function isPasswordStrong($password) {
        // Regola 1: Lunghezza minima di 8 caratteri
        // Usiamo strlen() per calcolare la lunghezza della stringa.
        if (strlen($password) < 8) {
            return false;
        }

        // Regola 2: Presenza di almeno una lettera maiuscola
        // Usiamo un'espressione regolare: preg_match con il pattern /[A-Z]/
        // che controlla se la stringa contiene qualsiasi carattere compreso tra A e Z maiuscoli.
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        // Regola 3: Presenza di almeno un numero
        // Usiamo un'espressione regolare: preg_match con il pattern /[0-9]/
        // che controlla se la stringa contiene cifre numeriche.
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }

        // Se tutte le verifiche precedenti non hanno ritornato false, la password è sicura!
        return true;
    }
}
