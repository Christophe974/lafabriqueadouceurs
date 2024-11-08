<?php
// Configuration du site
$siteName = "La Fabrique à Douceurs";
$siteUrl = "https://www.lafabriqueadouceurs.fr";

// Définir le chemin de base
define('BASE_PATH', '/');

// Fonction helper pour les URLs
function url($path) {
    return BASE_PATH . ltrim($path, '/');
}

// Navigation principale
$mainNav = [
    url('index.php') => 'Accueil',
    url('qui-suis-je.php') => 'Qui suis-je',
    url('carte.php') => 'La carte',
    url('tarifs.php') => 'Tarifs',
    url('contact.php') => 'Contact'
];

// Sous-menu de La carte
$carteSubmenu = [
    url('numbers-letters.php') => 'Numbers & Letters',
    url('classiques.php') => 'Les Classiques',
    url('layers.php') => 'Layers & Co',
    url('illusions.php') => 'Illusions',
    url('kids.php') => 'Kids',
    url('ptites-douceurs.php') => "P'tites Douceurs",
    url('gourmandises.php') => 'Gourmandises'
];