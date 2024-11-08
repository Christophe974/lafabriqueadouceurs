<?php 
$pageTitle = "Qui suis-je";
require_once __DIR__ . '/includes/config.php';  // Ajout du config.php
include __DIR__ . '/includes/header.php';       // Chemin absolu
?>

<section class="about-section">
    <div class="about-container">
        <div class="about-header">
            <h1 class="about-title">Qui suis-je ?</h1>
        </div>
        <div class="about-content">
            <!-- Images -->
            <div class="about-images">
                <!-- Image principale -->
                <div class="about-image-container" data-aos="fade-right">
                    <img src="<?php echo url('assets/images/products/accueil/vanessa-riche.jpg'); ?>" 
                         alt="Vanessa - La Fabrique à Douceurs" 
                         class="about-image">
                </div>
                <!-- Image secondaire -->
                <div class="about-image-container secondary" data-aos="fade-right" data-aos-delay="200">
                    <img src="<?php echo url('assets/images/products/accueil/licorne.jpg'); ?>" 
                         alt="Gâteau Licorne" 
                         class="about-image">
                </div>
            </div>
            <!-- Texte -->
            <div class="about-text" data-aos="fade-left">
                <p>
                    Je m'appelle Vanessa, fondatrice de <span class="highlight">La Fabrique à Douceurs</span> 
                    à Héricourt en Franche-Comté. Passionnée par la gourmandise et véritable fan de chocolat, 
                    mon aventure dans la pâtisserie est née d'un heureux hasard.
                </p>
                <p>
                    Depuis toujours, j'ai collectionné les livres de recettes autour du chocolat, 
                    fascinée par ses multiples facettes et son pouvoir de faire plaisir. Artiste dans l'âme 
                    mais sans talent pour le dessin ou la musique, je cherchais un moyen d'exprimer ma créativité.
                </p>
                <div class="timeline">
                    <div class="timeline-item">
                        <p>
                            C'est à l'automne 2018, pendant une convalescence due à une jambe cassée—preuve 
                            que le sport n'est pas mon domaine non plus—que tout a changé. Pour passer le temps, 
                            j'ai décidé de réaliser un fraisier en suivant une recette gratuite trouvée sur un 
                            site de formation. À ma grande surprise, le gâteau était non seulement beau mais aussi 
                            délicieux, réussi du premier coup !
                        </p>
                    </div>
                    <div class="timeline-item">
                        <p>
                            Cette expérience a été le déclic. Six mois plus tard, en candidate libre, 
                            je me lançais dans une formation professionnelle pour approfondir mes compétences 
                            en pâtisserie. Ma passion s'est transformée en vocation, et j'ai décidé de partager 
                            mon amour pour les douceurs avec vous.
                        </p>
                    </div>
                </div>
                <p>
                    Aujourd'hui, je mets tout mon savoir-faire au service de vos envies sucrées. 
                    Chaque création est une œuvre unique, confectionnée avec des ingrédients de qualité 
                    comme le <span class="highlight">chocolat intense</span> et les 
                    <span class="highlight">framboises acidulées</span>, pour des saveurs équilibrées 
                    et inoubliables.
                </p>
                <p>
                    <span class="highlight">La Fabrique à Douceurs</span>, c'est l'alliance de la passion, 
                    de la créativité et de l'exigence, pour des moments de dégustation mémorables. 
                    Rejoignez-moi dans cette aventure sucrée et laissez-vous tenter par des délices 
                    faits maison, conçus spécialement pour vous.
                </p>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; // Chemin absolu ?>
