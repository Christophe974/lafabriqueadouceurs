<?php
/**
 * Configuration Google Sheets API
 * Connexion automatique aux Google Sheets pour enregistrer les commandes
 */

// ID du Google Sheet où enregistrer les commandes
define('GOOGLE_SHEET_ID', '1xHXWPFziELyIixC6gOzsoS9uoRtyc7sxUPu2GVSxH94');

// Données du compte de service (à partir du fichier JSON)
$serviceAccountCredentials = [
    'type' => 'service_account',
    'project_id' => 'la-fabrique-a-douceurs',
    'private_key_id' => '393bbb3902a2bab4975c6d446d5eb8e7370055d9',
    'private_key' => "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDNfGNOlVkFbA9N\n/Y1/GhP3h0R2N7GwSQ4arRpBsR8AlzIlcA5ltLrgupwFrPJId391ApVah0+Dtd+W\naJkH1ZnixY+F3DSjSadYeEH0AF2RDWDoLRSUxT5HOlKAecMjuVEnpRRGZ9bNjQci\nOQnsHi+hHfgeQUn1F+3KG/iGCMXhlw7MbNXCm45mLLfU/OXR547YonYQo1+0vCqQ\nCWiUtehR5Jhw3JQysaze7eACzJyKZelYEp3r6s5KX/shtr224Afu0/g874EW/XH0\n846F2ZwzY+8QBzma/HJvaOKLrpDblZ+HetFM/oisAeC2tlyADI0l5y5CT0mdvUue\n/883rShFAgMBAAECggEAYfQevtIw2oXVkd8BeYpr5D5GI3iPKrLYl1zXPGN7nON2\nUyRkqJUL1J8ASzBTWrokNxohKkOAYw/q4p8/+90V+2Uj8rKzIPe2X1UMU41tDP1s\nqaD7w6N2+atSss3YeQoZJqXp0Vokql3E/cpk8Xq+R7aqlXmYEM70WrkUsogyFEP8\nZ/ShUhi7MnqD4npd9EuNuxNH9ovzWJNMAHX0NFW3382fKVVYEoSJKmYMVLe+Z7hT\nWu97IfjYO6nqqRGJ8rLCb482MNDILW22BvcAXqPDJ4qSthOgM6ssqF1NPE9HmIb8\nlPo+FbBhvgb8CSsY/oqJP+cVHTuz0/h6t8qoVffQ7QKBgQDotaVGYA1qUEEyDFQL\ntGeawIu7g5nFaMQMeoa8xdmh4SQxCilrmN2lk7nW5mDodProAe6aU5YGsgQr+bX6\nBtaZY+UAWpA3spwRgAPx/q6M7GMUrz4iDmA7biXNtIGWX0tHIRTdqP5plBeuRTuQ\n2zHsZyomS8OI22yRH808DIg4/wKBgQDiDTuZIVxIuIwx0xB5bsihCgLCPRgTKMTn\n/rsAfHd/y/Njts3DKf6srlpvw4DLcz7gwwMlWiLbomdYHe40PDhcHGksPvoWHkdO\nidK7VWLqA96CJvrQJj5BcsVI7VQ674wpWShYlE3wlDFXB6PlpcrB1I6oucL7gdCl\nH65XaP56uwKBgCJZvd3Xi+NnmVgT7cwUgz6asYWqdWZogpf89iqjYe69VyROBbM2\nS3GHjuUj+KYXrnnU3y20rO6sFGWRZMVVgRP/ZOxacfNm0BbdOLfeClIPCskg3SEV\n0iqzpazpuj9CLdCAF55otbVMAPreiV5mnMXyrIwenuxyx2HcueTlTK5tAoGAJCMz\nbOaNZz7BgtGYJ6GTR1NfX4f+yklROTla0dgUDoUfUsiNmm6jPR3ebVGWzG+PFMV4\nQkdnnS8YUFjwlL8vz2HnWmBzAIg0pBSacMJUvs6BitMKc645c6MScPcn6QgUoyOS\ntJ5420YFoUEibXsUr+n4KHcR+b0mCs/GwkiRrjMCgYAr9wty4+wYdYtRlxRQE9e0\nyajFSFUYGpvzGhjOzCvFwrJ1VzwcMLaM8uZDvgoreCq1DgwVV4CEQ9b2hsCbqt/E\n1xtxZrAwT9ag1KnhLl+U1QieS523h2oJAlNW1RhtzS3p18M8bit5oEjem+xvceF9\nheFTAzHwK0hC027yk91IXw==\n-----END PRIVATE KEY-----\n",
    'client_email' => 'lafabrique-sheets@la-fabrique-a-douceurs.iam.gserviceaccount.com',
    'client_id' => '109896027271292224434',
    'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
    'token_uri' => 'https://oauth2.googleapis.com/token',
    'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
];

/**
 * Classe pour gérer la connexion et l'envoi de données à Google Sheets
 */
class GoogleSheetsAPI {
    private $credentials;
    private $accessToken;
    private $tokenExpiry;

    public function __construct($credentials) {
        $this->credentials = $credentials;
        $this->accessToken = null;
        $this->tokenExpiry = 0;
    }

    /**
     * Obtenir un token d'accès JWT
     */
    private function getAccessToken() {
        // Si le token est encore valide, l'utiliser
        if ($this->accessToken && time() < $this->tokenExpiry) {
            return $this->accessToken;
        }

        error_log("=== Tentative d'obtention du token Google ===");

        // Créer un JWT
        $header = [
            'alg' => 'RS256',
            'typ' => 'JWT'
        ];

        $now = time();
        $claim = [
            'iss' => $this->credentials['client_email'],
            'scope' => 'https://www.googleapis.com/auth/spreadsheets',
            'aud' => $this->credentials['token_uri'],
            'exp' => $now + 3600,
            'iat' => $now
        ];

        $headerEncoded = rtrim(strtr(base64_encode(json_encode($header)), '+/', '-_'), '=');
        $claimEncoded = rtrim(strtr(base64_encode(json_encode($claim)), '+/', '-_'), '=');
        $signature = '';

        $private_key = $this->credentials['private_key'];
        
        if (!openssl_sign("$headerEncoded.$claimEncoded", $signature, $private_key, 'sha256')) {
            error_log("❌ Erreur signature OpenSSL");
            return null;
        }
        
        $signatureEncoded = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');
        $jwt = "$headerEncoded.$claimEncoded.$signatureEncoded";

        error_log("JWT créé avec succès");

        // Échanger le JWT pour un token d'accès
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->credentials['token_uri']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
        ]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        error_log("Réponse Google: HTTP $httpCode");
        
        if ($curlError) {
            error_log("Erreur CURL: $curlError");
            return null;
        }

        if ($httpCode !== 200) {
            error_log("❌ Erreur obtention token Google: HTTP $httpCode");
            error_log("Réponse: $response");
            return null;
        }

        $data = json_decode($response, true);
        
        if (!isset($data['access_token'])) {
            error_log("❌ Pas de token dans la réponse");
            error_log("Réponse: $response");
            return null;
        }

        $this->accessToken = $data['access_token'];
        $this->tokenExpiry = $now + $data['expires_in'] - 60;

        error_log("✅ Token obtenu avec succès");
        return $this->accessToken;
    }

    /**
     * Ajouter une ligne au Google Sheet
     */
    public function appendRow($sheetId, $values) {
        error_log("=== Ajout de ligne au Google Sheet ===");
        
        $token = $this->getAccessToken();
        if (!$token) {
            error_log("❌ Impossible d'obtenir le token d'accès Google");
            return false;
        }

        // URL correcte avec le nom de la feuille entre guillemets simples et URL encoded
        $url = "https://sheets.googleapis.com/v4/spreadsheets/$sheetId/values/%27Feuille%201%27:append?valueInputOption=RAW";

        error_log("URL: $url");

        $body = [
            'values' => [$values]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        error_log("Réponse Google Sheets: HTTP $httpCode");

        if ($curlError) {
            error_log("Erreur CURL: $curlError");
            return false;
        }

        if ($httpCode === 200 || $httpCode === 201) {
            error_log("✅ Données envoyées au Google Sheet avec succès");
            return true;
        } else {
            error_log("❌ Erreur envoi Google Sheets: HTTP $httpCode");
            error_log("Réponse: $response");
            return false;
        }
    }
}

// Initialiser l'API
$googleSheets = new GoogleSheetsAPI($serviceAccountCredentials);
?>