<?php 
$pageTitle = "La Carte";
require_once __DIR__ . '/includes/config.php';  // Ajout du config
include __DIR__ . '/includes/header.php';       // Chemin absolu
?>

<main class="carte-page">
    <!-- Hero Section -->
    <section class="carte-hero">
        <div class="container">
            <h1 class="carte-title">La Carte</h1>
            <p class="carte-subtitle">Découvrez nos créations artisanales</p>
        </div>
    </section>

    <!-- Catégories -->
    <section class="categories-section">
        <div class="container">
            <div class="categories-grid">
                <!-- Numbers & Letters -->
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?php echo url('assets/images/products/categorie/numberetletter.jpg'); ?>" 
                             alt="Numbers & Letters"
                             loading="lazy">
                    </div>
                    <div class="category-content">
                        <h2>Numbers & Letters</h2>
                        <p>Gâteaux personnalisés en forme de chiffres et lettres pour des événements uniques.</p>
                        <a href="<?php echo url('numbers-letters.php'); ?>" class="category-link">
                            Découvrir
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Classiques -->
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?php echo url('assets/images/products/categorie/classiques.jpg'); ?>" 
                             alt="Gâteaux Classiques"
                             loading="lazy">
                    </div>
                    <div class="category-content">
                        <h2>Les Classiques</h2>
                        <p>Les grands classiques de la pâtisserie revisités avec élégance.</p>
                        <a href="<?php echo url('classiques.php'); ?>" class="category-link">
                            Découvrir
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Layer Cakes -->
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?php echo url('assets/images/products/categorie/layer.jpg'); ?>" 
                             alt="Layer Cakes"
                             loading="lazy">
                    </div>
                    <div class="category-content">
                        <h2>Layer Cakes</h2>
                        <p>Des créations multicolores aux saveurs surprenantes.</p>
                        <a href="<?php echo url('layers.php'); ?>" class="category-link">
                            Découvrir
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Illusions -->
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?php echo url('assets/images/products/categorie/illusions.jpg'); ?>" 
                             alt="Gâteaux Illusions"
                             loading="lazy">
                    </div>
                    <div class="category-content">
                        <h2>Gâteaux Illusions</h2>
                        <p>Des gâteaux surprenants qui défient les apparences.</p>
                        <a href="<?php echo url('illusions.php'); ?>" class="category-link">
                            Découvrir
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Kids Birthday -->
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?php echo url('assets/images/products/categorie/kid.jpg'); ?>" 
                             alt="Kids Birthday"
                             loading="lazy">
                    </div>
                    <div class="category-content">
                        <h2>Kids Birthday</h2>
                        <p>Des gâteaux colorés et ludiques pour les anniversaires des enfants.</p>
                        <a href="<?php echo url('kids.php'); ?>" class="category-link">
                            Découvrir
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- P'tites Douceurs -->
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?php echo url('assets/images/products/categorie/ptitesdouceurs.jpg'); ?>" 
                             alt="P'tites Douceurs"
                             loading="lazy">
                    </div>
                    <div class="category-content">
                        <h2>P'tites Douceurs</h2>
                        <p>Une sélection de petites gourmandises pour tous les moments.</p>
                        <a href="<?php echo url('ptites-douceurs.php'); ?>" class="category-link">
                            Découvrir
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Gourmandises -->
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?php echo url('assets/images/products/categorie/gourmandises.jpg'); ?>" 
                             alt="Gourmandises"
                             loading="lazy">
                    </div>
                    <div class="category-content">
                        <h2>Gourmandises</h2>
                        <p>Des créations gourmandes pour les plus gourmands.</p>
                        <a href="<?php echo url('gourmandises.php'); ?>" class="category-link">
                            Découvrir
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; // Chemin absolu ?>