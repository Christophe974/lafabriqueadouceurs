<?php
$pageTitle = "Accueil";
require_once __DIR__ . '/includes/config.php';  // Chemin absolu
include __DIR__ . '/includes/header.php';       // Chemin absolu
?>



<main>
   <section class="hero-section">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Bienvenue chez<br>La Fabrique à Douceurs</h1>
        <p class="hero-subtitle">Votre spécialiste en pâtisseries sur mesure<br>à Héricourt en Franche-Comté</p>
        <a href="contact.php" class="hero-button">Découvrir nos créations</a>
    </div>
	   <div class="scroll-indicator">
    <i class="fas fa-chevron-down"></i>
</div>
</section>
	
	<section class="presentation-section">
    <div class="presentation-container">
        <div class="presentation-text">
            <p>
                <span class="highlight">Bienvenue chez La Fabrique à Douceurs</span>, votre spécialiste en 
                <span class="highlight">pâtisseries sur mesure à Héricourt en Franche-Comté</span>. 
                Je suis Vanessa, une passionnée de pâtisserie dédiée à la création de 
                <span class="highlight">gâteaux personnalisés</span> qui sublimeront vos moments les plus précieux.
            </p>

            <p>
                Que vous recherchiez un <span class="highlight">dessert d'exception</span> pour un mariage, 
                un anniversaire ou toute autre <span class="highlight">occasion spéciale</span>, 
                je mets mon savoir-faire à votre service pour réaliser toutes vos 
                <span class="highlight">envies sucrées</span>. J'accorde une importance particulière 
                à la sélection de chaque ingrédient, privilégiant le 
                <span class="highlight">chocolat intense</span> et les 
                <span class="highlight">framboises acidulées</span> pour des saveurs parfaitement équilibrées.
            </p>

            <p>
                Chaque création est une œuvre unique, conçue sur mesure pour harmoniser vos attentes 
                avec mon expertise culinaire. <span class="highlight">La Fabrique à Douceurs</span>, 
                c'est l'alliance de la finesse, de l'originalité et de la passion dans chacune de nos pâtisseries.
            </p>

            <p>
                Laissez-vous tenter par une expérience gustative inoubliable et faites de votre événement 
                un moment mémorable.
            </p>
        </div>

        <div class="key-points">
            <div class="key-point">
                <i class="fas fa-birthday-cake"></i>
                <h3>Gâteaux Personnalisés</h3>
                <p>Des créations uniques pour vos événements spéciaux</p>
            </div>
            <div class="key-point">
                <i class="fas fa-heart"></i>
                <h3>Passion & Savoir-faire</h3>
                <p>L'excellence artisanale à votre service</p>
            </div>
            <div class="key-point">
                <i class="fas fa-star"></i>
                <h3>Qualité Premium</h3>
                <p>Les meilleurs ingrédients sélectionnés avec soin</p>
            </div>
        </div>

<div class="contact-button-container">
    <a href="contact.php" class="btn">
        Contactez-moi dès aujourd'hui
        <i class="fas fa-arrow-right"></i>
    </a>
</div>
    </div>
</section>
	<section class="reviews-section">
    <div class="reviews-container">
        <div class="reviews-header">
            <h2 class="reviews-title">Nos clients témoignent</h2>
            <p class="reviews-subtitle">Découvrez l'expérience de nos clients</p>
        </div>
         <div class="reviews-widget-container">
            <!-- Remplacez le src par l'URL de votre widget Google -->
            <iframe src='https://widgets.sociablekit.com/google-reviews/iframe/25482173' frameborder='0' width='100%' height='500'></iframe>
        </div>
    </div>
</section>
	<section class="gallery-section">
    <div class="gallery-container">
        <h2 class="gallery-title">Découvrez nos créations</h2>
        <div class="gallery-grid">
            <!-- Première image -->
            <div class="gallery-card">
                <div class="gallery-image-container">
                        <img src="<?php echo url('assets/images/products/accueil/lafabriqueadouceurs1.jpg'); ?>" 

                         alt="Création pâtissière 1" 
                         class="gallery-image">
                    <div class="gallery-overlay">
                        <div class="gallery-text">Gâteaux sur mesure</div>
                    </div>
                </div>
            </div>

            <!-- Deuxième image -->
            <div class="gallery-card">
                <div class="gallery-image-container">
                                <img src="<?php echo url('assets/images/products/accueil/lafabriqueadouceurs2.jpg'); ?>" 

                         alt="Création pâtissière 2" 
                         class="gallery-image">
                    <div class="gallery-overlay">
                        <div class="gallery-text">Pâtisseries artisanales</div>
                    </div>
                </div>
            </div>

            <!-- Troisième image -->
            <div class="gallery-card">
                <div class="gallery-image-container">
                                <img src="<?php echo url('assets/images/products/accueil/lafabriqueadouceurs3.jpg'); ?>" 

                         alt="Création pâtissière 3" 
                         class="gallery-image">
                    <div class="gallery-overlay">
                        <div class="gallery-text">Créations uniques</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<?php include __DIR__ . '/includes/footer.php'; // Chemin absolu ?>