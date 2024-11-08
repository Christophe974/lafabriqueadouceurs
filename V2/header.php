<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteName; ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo url('assets/images/favicon.ico'); ?>">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS Principal -->
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/responsive.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/footer.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/reviews.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/about.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/carte.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/classique.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/numbers-letters.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/layers.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/ptitesdouceurs.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/gourmandises.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/illusions.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/kids.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/tarifs.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/contact.css'); ?>">
</head>
<body>
    <header class="main-header">
        <div class="nav-container">
            <!-- Logo -->
            <a href="<?php echo url('index.php'); ?>" class="logo">
                La Fabrique à Douceurs
            </a>

            <!-- Navigation -->
            <nav class="main-nav">
                <button class="burger-menu" aria-label="Menu">
                    <i class="fas fa-bars"></i>
                </button>

                <ul class="nav-menu">
                    <li><a href="<?php echo url('index.php'); ?>">Accueil</a></li>
                    <li><a href="<?php echo url('qui-suis-je.php'); ?>">Qui suis-je ?</a></li>
                    <li class="has-submenu">
                        <a href="<?php echo url('carte.php'); ?>">La Carte</a>
                        <ul class="submenu">
                            <li><a href="<?php echo url('numbers-letters.php'); ?>">Numbers & Letters</a></li>
                            <li><a href="<?php echo url('classiques.php'); ?>">Les Classiques</a></li>
                            <li><a href="<?php echo url('layers.php'); ?>">Layer Cakes</a></li>
                            <li><a href="<?php echo url('illusions.php'); ?>">Gâteaux Illusions</a></li>
                            <li><a href="<?php echo url('kids.php'); ?>">Kids Birthday</a></li>
                            <li><a href="<?php echo url('ptites-douceurs.php'); ?>">P'tites Douceurs</a></li>
                            <li><a href="<?php echo url('gourmandises.php'); ?>">Gourmandises</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo url('tarifs.php'); ?>">Tarifs</a></li>
                    <li><a href="<?php echo url('contact.php'); ?>">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>