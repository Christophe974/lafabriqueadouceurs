<?php
$pageTitle = "La Fabrique à Douceurs - Pâtisserie Sur Mesure à Héricourt, Franche-Comté";
$metaDescription = "Découvrez La Fabrique à Douceurs, votre artisan pâtissier à Héricourt. Gâteaux personnalisés, number cakes, layer cakes et pâtisseries sur mesure pour vos événements en Franche-Comté.";

// Inclusion des fichiers nécessaires
require_once __DIR__ . '/includes/config.php';

// Ajout des meta tags SEO dans le header
$additionalMeta = '
    <meta name="description" content="' . $metaDescription . '">
    <meta name="keywords" content="pâtisserie sur mesure, gâteau personnalisé, number cake, layer cake, gâteau anniversaire, pâtisserie Héricourt, gâteau mariage Franche-Comté, cake design, pâtisserie artisanale">
    <meta property="og:title" content="La Fabrique à Douceurs - Pâtisserie Artisanale Sur Mesure">
    <meta property="og:description" content="' . $metaDescription . '">
    <meta property="og:image" content="/lafabriqueadouceurs/assets/images/icons/logo-lafabriqueadouceurs.png">
    <meta property="og:type" content="website">
    <link rel="canonical" href="https://votresite.com" />
    <meta name="robots" content="index, follow">
    <meta name="author" content="La Fabrique à Douceurs">
    <meta name="geo.region" content="FR-BFC">
    <meta name="geo.placename" content="Héricourt">';

include __DIR__ . '/includes/header.php';
?>

<main>
    <section class="hero-section">
        <div class="hero-background" role="img" aria-label="Fond décoratif de pâtisseries"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">La Fabrique à Douceurs<br>Pâtisserie Artisanale à Héricourt</h1>
            <p class="hero-subtitle">Votre artisan pâtissier spécialiste en créations sur mesure<br>à Héricourt en Franche-Comté</p>
            <a href="contact.php" class="btn" title="Découvrir nos créations pâtissières">
                Découvrir nos créations
                <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down" aria-hidden="true"></i>
        </div>
    </section>
	
    <section class="presentation-section">
        <div class="presentation-container">
            <div class="presentation-text">
                <h2>Pâtisserie Artisanale Sur Mesure en Franche-Comté</h2>
                <p>
                    <span class="highlight">Bienvenue chez La Fabrique à Douceurs</span>, votre artisan pâtissier de référence en 
                    <span class="highlight">Franche-Comté</span>. Je suis Vanessa, artisan pâtissière passionnée, spécialisée dans la création de 
                    <span class="highlight">gâteaux personnalisés</span> qui sublimeront vos célébrations.
                </p>

                <p>
                    Expertise en <span class="highlight">number cakes</span>, <span class="highlight">layer cakes</span>, et 
                    <span class="highlight">gâteaux de mariage</span>. Chaque création est unique, élaborée avec des 
                    <span class="highlight">ingrédients premium</span> : <span class="highlight">chocolat d'exception</span>, 
                    <span class="highlight">fruits frais</span>, et décorations sur mesure.
                </p>

                <p>
                    Située à <span class="highlight">Héricourt</span>, La Fabrique à Douceurs vous propose des créations 
                    artisanales pour tous vos événements : mariages, anniversaires, baptêmes et célébrations professionnelles.
                </p>

                <p>
                    Transformez vos moments spéciaux en souvenirs inoubliables avec nos pâtisseries artisanales sur mesure.
                </p>
            </div>

            <div class="key-points">
                <div class="key-point">
                    <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                    <h3>Gâteaux Personnalisés</h3>
                    <p>Créations uniques pour vos événements spéciaux : number cakes, layer cakes, gâteaux sculptés</p>
                </div>
                <div class="key-point">
                    <i class="fas fa-heart" aria-hidden="true"></i>
                    <h3>Artisanat & Savoir-faire</h3>
                    <p>Excellence artisanale et techniques pâtissières traditionnelles</p>
                </div>
                <div class="key-point">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <h3>Qualité Premium</h3>
                    <p>Ingrédients sélectionnés avec soin pour des saveurs d'exception</p>
                </div>
            </div>

            <div class="contact-button-container">
                <a href="contact.php" class="btn" title="Contactez votre pâtissière à Héricourt">
                    Contactez-moi pour votre commande
                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="reviews-section">
        <div class="reviews-container">
            <div class="reviews-header">
                <h2 class="reviews-title">Avis Clients La Fabrique à Douceurs</h2>
                <p class="reviews-subtitle">Découvrez les retours de nos clients satisfaits à Héricourt</p>
            </div>
            <div class="reviews-widget-container">
                <iframe src='https://widgets.sociablekit.com/google-reviews/iframe/25482173' 
                        title="Avis Google de La Fabrique à Douceurs"
                        frameborder='0' 
                        width='100%' 
                        height='500'>
                </iframe>
            </div>
        </div>
    </section>

    <section class="gallery-section">
        <div class="gallery-container">
            <h2 class="gallery-title">Nos Créations Pâtissières Artisanales</h2>
            <div class="gallery-grid">
                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="assets/images/products/accueil/lafabriqueadouceurs1.jpg" 
                             alt="Gâteau personnalisé sur mesure La Fabrique à Douceurs Héricourt" 
                             class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-text">Gâteaux sur mesure artisanaux</div>
                        </div>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="assets/images/products/accueil/lafabriqueadouceurs2.jpg" 
                             alt="Pâtisserie artisanale La Fabrique à Douceurs Franche-Comté" 
                             class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-text">Pâtisseries artisanales sur mesure</div>
                        </div>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="assets/images/products/accueil/lafabriqueadouceurs3.jpg" 
                             alt="Number cake et Layer cake La Fabrique à Douceurs" 
                             class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-text">Créations pâtissières personnalisées</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>