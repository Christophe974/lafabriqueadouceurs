<?php
// Test de la connexion Google Sheets avec logs visibles

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Créer un fichier pour capturer les logs
$logFile = __DIR__ . '/test-debug.log';
file_put_contents($logFile, "=== TEST GOOGLE SHEETS - " . date('Y-m-d H:i:s') . " ===\n", FILE_APPEND);

// Rediriger error_log vers le fichier et l'affichage
ini_set('log_errors', 1);
ini_set('error_log', $logFile);

function debugLog($msg) {
    global $logFile;
    $timestamp = date('H:i:s');
    error_log("[$timestamp] $msg");
    echo "<p><small>[$timestamp] $msg</small></p>";
}

echo "<h1>Test Google Sheets API - DEBUG</h1>";

debugLog("Test démarré");

// Vérifier si curl est activé
if (!extension_loaded('curl')) {
    debugLog("❌ ERREUR : L'extension CURL n'est pas activée!");
    exit;
} else {
    debugLog("✅ CURL activée");
}

// Vérifier OpenSSL
if (!extension_loaded('openssl')) {
    debugLog("❌ ERREUR : L'extension OpenSSL n'est pas activée!");
    exit;
} else {
    debugLog("✅ OpenSSL activée");
}

// Inclure la configuration
debugLog("Inclusion de google-sheets-config.php...");
require_once __DIR__ . '/google-sheets-config.php';
debugLog("✅ google-sheets-config.php inclus");

echo "<p>Google Sheet ID: " . GOOGLE_SHEET_ID . "</p>";
echo "<p>Email du compte de service: " . $serviceAccountCredentials['client_email'] . "</p>";

// Tester l'envoi d'une ligne
$testRow = [
    date('Y-m-d H:i:s'),
    'Test',
    'Utilisateur',
    'test@example.com',
    '06 00 00 00 00',
    '1x Test Produit',
    '10€',
    '17 décembre',
    'Message de test'
];

echo "<h2>Tentative d'envoi d'une ligne de test...</h2>";

debugLog("Appel à appendRow...");
$result = $googleSheets->appendRow(GOOGLE_SHEET_ID, $testRow);
debugLog("appendRow retourné: " . ($result ? 'TRUE' : 'FALSE'));

if ($result === true) {
    echo "<p style='color: green;'><strong>✅ SUCCÈS ! Données envoyées au Google Sheet</strong></p>";
} else {
    echo "<p style='color: red;'><strong>❌ ERREUR lors de l'envoi</strong></p>";
}

echo "<h2>Fichier de log :</h2>";
echo "<pre style='background: #f5f5f5; padding: 10px; border: 1px solid #ddd;'>";
echo htmlspecialchars(file_get_contents($logFile));
echo "</pre>";

echo "<p><small>Fichier de log: $logFile</small></p>";

?>