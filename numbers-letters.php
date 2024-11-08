<?php 
$pageTitle = "Numbers & Letters";
require_once __DIR__ . '/includes/config.php';  // Ajout du config
include __DIR__ . '/includes/header.php';       // Chemin absolu
?>

<main>
    <!-- Hero Section -->
    <section class="numbers-hero">
        <div class="container">
            <h1 class="numbers-title">Numbers & Letters</h1>
            <p class="numbers-subtitle">Des créations uniques pour vos événements spéciaux</p>
        </div>
    </section>

    <!-- Description Section -->
    <section class="numbers-description">
        <div class="container">
            <div class="numbers-intro">
                <p class="numbers-lead">
                    Donnez une touche personnelle et créative à vos événements avec nos 
                    <span class="highlight">gâteaux Numbers & Letters</span>. Que vous célébriez un anniversaire, 
                    un mariage, une naissance ou toute autre occasion spéciale, nos gâteaux en forme de 
                    <span class="highlight">chiffres</span>, de <span class="highlight">lettres</span>, 
                    de <span class="highlight">cœurs</span>, de <span class="highlight">papillons</span> ou 
                    d'<span class="highlight">animaux</span> sauront émerveiller vos invités.
                </p>
            </div>

            <!-- Options Grid -->
            <div class="numbers-options">
                <div class="option-card" data-aos="fade-up">
                    <div class="option-icon">
                        <i class="fas fa-cookie"></i>
                    </div>
                    <h3>Options de biscuits</h3>
                    <ul>
                        <li><span class="highlight">Génoise légère et moelleuse</span>, idéale pour une texture aérienne</li>
                        <li><span class="highlight">Pâte sucrée aux amandes</span>, pour une base croustillante et savoureuse</li>
                    </ul>
                </div>

                <div class="option-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="option-icon">
                        <i class="fas fa-ice-cream"></i>
                    </div>
                    <h3>Saveurs disponibles</h3>
                    <ul>
                        <li><span class="highlight">Chocolat intense</span>, pour les passionnés de cacao</li>
                        <li><span class="highlight">Vanille onctueuse</span> associée à un assortiment de <span class="highlight">fruits frais</span></li>
                    </ul>
                </div>

                <div class="option-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="option-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Personnalisation</h3>
                    <ul>
                        <li><span class="highlight">Formes variées</span> selon vos envies</li>
                        <li><span class="highlight">Décoration sur mesure</span> adaptée à votre thème</li>
                        <li><span class="highlight">Couleurs personnalisées</span> pour votre événement</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

  <!-- Galerie -->
    <section class="numbers-gallery">
        <div class="container">
            <h2 class="gallery-title">Nos Créations Numbers & Letters</h2>
            <div class="gallery-grid">
                <?php
                for($i = 1; $i <= 20; $i++) {
                    echo "
                    <div class='gallery-card' data-aos='zoom-in'>
                        <div class='gallery-image-container'>
                            <img src='" . url("assets/images/products/numbers-letters/Number{$i}.jpg") . "' 
                                 alt='Number {$i}' 
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
    <section class="numbers-cta">
        <div class="container">
            <h2 data-aos="fade-up">Prêt à commander votre création unique ?</h2>
            <p data-aos="fade-up" data-aos-delay="100">Faites de votre événement un moment inoubliable</p>
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