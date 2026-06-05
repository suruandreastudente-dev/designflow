<?php
// Wrapper per Firebase JWT

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHandler {
    private static $secret_key = "design_flow_secret_key_123456";
    private static $alg = "HS256";

    /**
     * Genera un token JWT firmato
     * @param array $data Payload personalizzato (es. ID, ruolo)
     * @return string
     */
    public static function generateToken($data) {
        $issued_at = time();
        $expiration_time = $issued_at + (2 * 60 * 60); // Scadenza +2 ore

        $payload = array(
            "iat" => $issued_at,
            "exp" => $expiration_time,
            "data" => $data
        );

        return JWT::encode($payload, self::$secret_key, self::$alg);
    }

    /**
     * Valida e decodifica un token JWT
     * @param string $token
     * @return array|false Payload decodificato o false in caso di errore
     */
    public static function validateToken($token) {
        try {
            $decoded = JWT::decode($token, new Key(self::$secret_key, self::$alg));
            return (array) $decoded->data;
        } catch (Exception $e) {
            error_log("Validazione JWT fallita: " . $e->getMessage());
            return false;
        }
    }
}
