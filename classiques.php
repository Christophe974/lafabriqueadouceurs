<?php 
$pageTitle = "Les Classiques";
require_once __DIR__ . '/includes/config.php';  // Ajout du config
include __DIR__ . '/includes/header.php';       // Chemin absolu
?>

<main>
    <!-- Hero Section -->
    <section class="classique-hero">
        <div class="container">
            <h1 class="classique-title">Les Classiques</h1>
            <p class="classique-subtitle">L'univers intemporel de la pâtisserie française</p>
        </div>
    </section>

    <!-- Description Section -->
    <section class="classique-description">
        <div class="container">
            <div class="classique-intro">
                <p class="classique-lead">
                    Plongez dans l'univers intemporel de la pâtisserie française avec nos 
                    <span class="highlight">Classiques</span>. Chez 
                    <span class="highlight">La Fabrique à Douceurs</span>, nous célébrons les recettes 
                    traditionnelles en y apportant une touche personnelle, pour des créations à la fois 
                    authentiques et uniques.
                </p>
            </div>

            <!-- Options Grid -->
            <div class="classique-options">
                <div class="option-card" data-aos="fade-up">
                    <div class="option-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <h3>Nos Pâtisseries Classiques</h3>
                    <ul>
                        <li><span class="highlight">Vaucluse</span> - Douceur des amandes et richesse du chocolat</li>
                        <li><span class="highlight">Fraisier</span> - Génoise moelleuse et crème mousseline vanillée</li>
                        <li><span class="highlight">Forêt Noire</span> - Chocolat, chantilly et cerises griottes</li>
                        <li><span class="highlight">Framboisier</span> - Variation fruitée et rafraîchissante</li>
                        <li><span class="highlight">Charlottes</span> - Élégance des mousses fruitées ou chocolatées</li>
                    </ul>
                </div>

         <div class="option-card" data-aos="fade-up" data-aos-delay="100">
    <div class="option-icon">
        <i class="fas fa-star"></i>
    </div>
    <h3>La Douceur de l'Écureuil</h3>
    <ul>
        <li><span class="highlight">Sablé breton</span> croustillant en base</li>
        <li><span class="highlight">Biscuit chocolat</span> moelleux</li>
        <li><span class="highlight">Mousse gianduja</span> onctueuse</li>
        <li><span class="highlight">Glaçage gourmand</span> au chocolat</li>
    </ul>
    <div class="specialty-badge">
        <i class="fas fa-award"></i>
        <span>Notre spécialité</span>
    </div>
</div>

                <div class="option-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="option-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Nos Engagements</h3>
                    <ul>
                        <li><span class="highlight">Artisanat authentique</span> et savoir-faire traditionnel</li>
                        <li><span class="highlight">Ingrédients de qualité</span> frais et locaux</li>
                        <li><span class="highlight">Personnalisation</span> selon vos préférences</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Galerie -->
    <section class="classique-gallery">
        <div class="container">
            <h2 class="gallery-title">Nos Créations Classiques</h2>
            <div class="gallery-grid">
                <?php
                for($i = 1; $i <= 18; $i++) {
                    echo "
                    <div class='gallery-card' data-aos='zoom-in'>
                        <div class='gallery-image-container'>
                            <img src='" . url("assets/images/products/classiques/Classique{$i}.jpg") . "' 
                                 alt='Classique {$i}' 
                                 class='gallery-image'
                                 loading='lazy'>
                            <div class='gallery-overlay'>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="classique-cta">
        <div class="container">
            <h2 data-aos="fade-up">Envie de redécouvrir les classiques ?</h2>
            <p data-aos="fade-up" data-aos-delay="100">Commandez vos pâtisseries artisanales préparées avec amour et expertise</p>
            <div class="contact-button-container" data-aos="fade-up" data-aos-delay="200">
                <a href="<?php echo url('contact.php'); ?>" class="contact-button">
                    <span class="highlight">Contactez-moi dès aujourd'hui</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; // Chemin absolu ?>