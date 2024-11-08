<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test CSS</title>
    <style>
        body { background-color: #ff9eb3; }
    </style>
</head>
<body>
    <h1>Test CSS</h1>
    <?php
    // Afficher le chemin actuel
    echo "<p>Chemin actuel : " . __DIR__ . "</p>";
    // Lister les fichiers du dossier assets/css
    echo "<p>Contenu du dossier CSS :</p>";
    $cssFiles = glob(__DIR__ . '/assets/css/*.css');
    foreach($cssFiles as $file) {
        echo "<p>" . basename($file) . "</p>";
    }
    ?>
</body>
</html>