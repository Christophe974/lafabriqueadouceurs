<?php
header('Content-Type: application/json; charset=utf-8');

// Inclure la configuration Google Sheets avec chemin absolu
$configFile = __DIR__ . '/google-sheets-config.php';
if (file_exists($configFile)) {
    require_once $configFile;
} else {
    error_log("❌ Fichier de config Google Sheets non trouvé: $configFile");
}

// Récupérer les données JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Log pour debug (à vérifier dans error_log)
error_log('Données reçues: ' . print_r($data, true));

// Validation basique
if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Données invalides']);
    exit;
}

if (!isset($data['email']) || !isset($data['name'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email ou nom manquant']);
    exit;
}

try {
    // ============================================================================
    // EXTRAIRE LE PRÉNOM ET LE NOM
    // ============================================================================
    
    $fullName = $data['name'] ?? '';
    $nameParts = explode(' ', trim($fullName));
    $firstname = isset($nameParts[0]) ? trim($nameParts[0]) : '';
    $lastname = isset($nameParts[1]) ? trim($nameParts[1]) : '';
    
    // Si pas de deuxième partie, mettre tout en lastname
    if (empty($lastname) && !empty($firstname)) {
        $lastname = $firstname;
    }
    
    // ============================================================================
    // 1. ENREGISTRER EN CSV LOCAL
    // ============================================================================
    
    $csvFile = __DIR__ . '/commandes_noel.csv';
    
    // Formater les produits pour CSV
    $itemsStr = '';
    if (isset($data['items']) && is_array($data['items'])) {
        foreach ($data['items'] as $item) {
            if ($itemsStr) $itemsStr .= ' | ';
            $itemsStr .= "{$item['quantity']}x {$item['name']} ({$item['subtotal']}€)";
        }
    }

    // Créer ou ouvrir le fichier CSV
    $fileExists = file_exists($csvFile);
    $fp = @fopen($csvFile, 'a');

    if (!$fp) {
        error_log("Impossible d'ouvrir le fichier CSV: $csvFile");
        throw new Exception('Impossible de sauvegarder les données.');
    }

    // Ajouter l'en-tête si le fichier est nouveau
    if (!$fileExists) {
        fputcsv($fp, [
            'Timestamp',
            'Nom',
            'Email',
            'Téléphone',
            'Date Retrait',
            'Produits',
            'Message Personnalisé',
            'Total'
        ], ';');
    }

    // Ajouter la ligne de la commande
    fputcsv($fp, [
        date('Y-m-d H:i:s'),
        $data['name'] ?? '',
        $data['email'] ?? '',
        $data['phone'] ?? '',
        $data['date'] ?? '',
        $itemsStr,
        $data['message'] ?? '',
        ($data['total'] ?? 0) . '€'
    ], ';');

    fclose($fp);
    
    // Définir les permissions correctes
    @chmod($csvFile, 0644);
    
    error_log("CSV sauvegardé avec succès: $csvFile");

    // ============================================================================
    // 1.5 ENVOYER LES DONNÉES AU GOOGLE SHEET
    // ============================================================================
    
    // Vérifier si l'objet Google Sheets est disponible
    if (isset($googleSheets) && $googleSheets !== null) {
        // Formater les produits pour Google Sheets
        $productsStr = '';
        if (isset($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $item) {
                if ($productsStr) $productsStr .= ' | ';
                $productsStr .= "{$item['quantity']}x {$item['name']}";
            }
        }

        // Préparer les données pour le Google Sheet
        $sheetRow = [
            date('Y-m-d H:i:s'),                    // Timestamp
            $firstname,                              // Prénom
            $lastname,                               // Nom
            $data['email'] ?? '',                    // Email
            $data['phone'] ?? '',                    // Téléphone
            $productsStr,                            // Produits
            ($data['total'] ?? 0) . '€',             // Total
            $data['date'] ?? '',                     // Date Retrait
            $data['message'] ?? ''                   // Message Marque-page
        ];

        // Envoyer au Google Sheet
        $googleSheets->appendRow(GOOGLE_SHEET_ID, $sheetRow);
        error_log("✅ Données envoyées à Google Sheets");
    } else {
        error_log("⚠️ Google Sheets non disponible, envoi en CSV uniquement");
    }

    // ============================================================================
    // 2. ENVOYER L'EMAIL (optionnel - peut échouer)
    // ============================================================================
    
    $to = $data['email'];
    $subject = "Confirmation de commande - Coffrets de fin d'année";
    
    // Construire le tableau des produits
    $itemsHtml = '';
    if (isset($data['items']) && is_array($data['items'])) {
        foreach ($data['items'] as $item) {
            $qty = intval($item['quantity'] ?? 0);
            $price = floatval($item['subtotal'] ?? 0);
            $itemsHtml .= "
            <tr>
                <td style='padding: 10px; border-bottom: 1px solid #e0e0e0;'>{$qty}x {$item['name']}</td>
                <td style='padding: 10px; border-bottom: 1px solid #e0e0e0; text-align: right;'>{$price}€</td>
            </tr>";
        }
    }

    $messageBlock = '';
    if (!empty($data['message'])) {
        $msgEchappé = htmlspecialchars($data['message']);
        $messageBlock = "
            <div style='background: #f9f9f9; padding: 15px; border-left: 4px solid #c41e3a; margin: 20px 0; border-radius: 4px;'>
                <p style='margin: 0; color: #666;'><strong>Message personnalisé:</strong></p>
                <p style='margin: 10px 0 0 0; color: #666; font-style: italic; font-size: 14px;'>\"" . nl2br($msgEchappé) . "\"</p>
            </div>";
    }

    $html = "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head>
    <body style='font-family: Arial, sans-serif; color: #333; margin: 0; padding: 0;'>
        <div style='max-width: 600px; margin: 0 auto; background: white;'>
            <div style='background: linear-gradient(135deg, #1a472a 0%, #8b0000 100%); color: white; padding: 40px 20px; text-align: center; border-radius: 8px 8px 0 0;'>
                <h1 style='margin: 0; font-size: 32px; letter-spacing: 1px;'>Commande confirmée !</h1>
                <p style='margin: 10px 0 0 0; font-size: 16px; opacity: 0.9;'>Merci de votre confiance</p>
            </div>

            <div style='padding: 40px 20px;'>
                <p style='font-size: 16px; margin-bottom: 25px;'>Bonjour <strong>" . htmlspecialchars($firstname) . "</strong>,</p>

                <p style='color: #999; font-size: 12px; margin-bottom: 20px;'>Un email de confirmation a été envoyé à : <strong>" . htmlspecialchars($to) . "</strong></p>

                <p style='color: #666; line-height: 1.6; margin-bottom: 25px;'>
                    Merci de votre commande ! Voici le récapitulatif complet.
                </p>

                <div style='background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 25px;'>
                    <h2 style='margin: 0 0 15px 0; color: #c41e3a; font-size: 18px;'>Vos produits :</h2>
                    <table style='width: 100%; border-collapse: collapse;'>
                        {$itemsHtml}
                    </table>
                    <div style='margin-top: 15px; padding-top: 15px; border-top: 2px solid #c41e3a; display: flex; justify-content: space-between; font-weight: bold; font-size: 18px; color: #c41e3a;'>
                        <span>Total :</span>
                        <span>" . htmlspecialchars($data['total'] . '€') . "</span>
                    </div>
                </div>

                <div style='background: #fff5f5; padding: 20px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #c41e3a;'>
                    <h2 style='margin: 0 0 15px 0; color: #c41e3a; font-size: 18px;'>Retrait de votre commande :</h2>
                    <p style='margin: 8px 0; color: #666;'><strong>Date :</strong> " . htmlspecialchars($data['date']) . "</p>
                    <p style='margin: 8px 0; color: #666;'><strong>Lieu :</strong> La Fabrique à Douceurs, Héricourt</p>
                </div>

                {$messageBlock}

                <p style='color: #666; line-height: 1.6; margin-bottom: 25px;'>
                    À très bientôt à La Fabrique à Douceurs !
                </p>
            </div>

            <!-- Section Contact & Réseaux -->
            <div style='background: linear-gradient(135deg, #1a472a 0%, #2d5a3d 50%); color: white; padding: 40px 20px;'>
                <div style='max-width: 600px; margin: 0 auto;'>
                    <h3 style='margin: 0 0 20px 0; font-size: 18px; text-align: center;'>La Fabrique à Douceurs</h3>
                    
                    <!-- Coordonnées -->
                    <div style='margin-bottom: 20px; line-height: 1.8; font-size: 14px;'>
                        <p style='margin: 5px 0;'><strong>📍 Adresse :</strong> 56 Avenue Jean Jaures - 70400 Héricourt</p>
                        <p style='margin: 5px 0;'><strong>📞 Téléphone :</strong> 06 24 66 55 40</p>
                        <p style='margin: 5px 0;'><strong>📧 Email :</strong> lafabriqueadouceurs70@gmail.com</p>
                    </div>
                    
                    <!-- Réseaux Sociaux -->
                    <div style='text-align: center; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 15px;'>
                        <p style='margin: 0 0 12px 0; font-size: 14px;'><strong>Suivez-nous :</strong></p>
                        <div style='display: flex; justify-content: center; gap: 20px; font-size: 16px;'>
                            <a href='https://www.facebook.com/profile.php?id=100095251458087' style='color: white; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;'>
                                <span style='font-size: 20px;'>f</span> Facebook
                            </a>
                            <a href='https://www.instagram.com/sweetnessbyvaness/' style='color: white; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;'>
                                <span style='font-size: 20px;'>📷</span> Instagram
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div style='background: #f5f5f5; padding: 20px; text-align: center; color: #999; font-size: 12px; border-radius: 0 0 8px 8px; border-top: 1px solid #e0e0e0;'>
                <p style='margin: 5px 0;'>La Fabrique à Douceurs</p>
                <p style='margin: 5px 0;'>Héricourt, Franche-Comté</p>
            </div>
        </div>
    </body>
    </html>";

    // Envoyer l'email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: lafabriqueadouceurs70@gmail.com\r\n";
    
    $emailSent = @mail($to, $subject, $html, $headers);
    
    if ($emailSent) {
        error_log("Email envoyé à: $to");
    } else {
        error_log("Erreur lors de l'envoi de l'email à: $to");
    }

    // ============================================================================
    // 3. RÉPONSE DE SUCCÈS
    // ============================================================================

    echo json_encode([
        'success' => true,
        'message' => 'Commande validée avec succès'
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    error_log('Erreur dans process-order: ' . $e->getMessage());
}
?>