<?php 
header('Content-Type: text/html; charset=UTF-8');
$pageTitle = "Tarifs";
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="tarifs-hero">
        <div class="container">
            <h1 class="tarifs-title">Nos Tarifs</h1>
            <p class="tarifs-subtitle">Des créations sur mesure pour tous vos événements</p>
        </div>
    </section>

    <!-- Tarifs Section -->
    <section class="tarifs-section">
        <div class="tarifs-container">
           <!-- Modification du premier cartouche dans tarifs.php -->
<div class="tarifs-grid">
    <!-- Numbers, Letters & Heart Cake - Plus de classe highlight -->
    <div class="price-card" data-aos="fade-up">
        <h2 class="price-title">Numbers, Letters & Heart Cake</h2>
        <ul class="price-list">
            <li class="price-item">
                <span class="price-name">La part</span>
                <span class="price-value">5,30€</span>
            </li>
        </ul>
    </div>

                <!-- Les Classiques -->
                <div class="price-card" data-aos="fade-up">
                    <h2 class="price-title">Les Classiques</h2>
                    <ul class="price-list">
                        <li class="price-item">
                            <span class="price-name">La part</span>
                            <span class="price-value">4,30€</span>
                        </li>
                    </ul>
                </div>

                <!-- Layers -->
                <div class="price-card" data-aos="fade-up">
                    <h2 class="price-title">Layers</h2>
                    <ul class="price-list">
                        <li class="price-item">
                            <span class="price-name">Layers et drips cake</span>
                            <span class="price-value">7,00€/part</span>
                        </li>
                        <li class="price-item">
                            <span class="price-name">Nude cake</span>
                            <span class="price-value">5,30€</span>
                        </li>
                        <li class="price-item">
                            <span class="price-name">Bento cake 2-3 parts</span>
                            <span class="price-value">18€</span>
                        </li>
                        <li class="price-item">
                            <span class="price-name">Bento cake 5-6 parts</span>
                            <span class="price-value">30€</span>
                        </li>
                    </ul>
                </div>

                <!-- Illusions -->
                <div class="price-card" data-aos="fade-up">
                    <h2 class="price-title">Illusions</h2>
                    <ul class="price-list">
                        <li class="price-item">
                            <span class="price-name">Mini fraises et citrons</span>
                            <span class="price-value">2€/pièce</span>
                        </li>
                        <li class="price-item">
                            <span class="price-name">Méga tablette 6-8 parts</span>
                            <span class="price-value">30€</span>
                        </li>
                        <li class="price-item">
                            <span class="price-name">Cagette</span>
                            <span class="price-value">5,30€/part</span>
                        </li>
                    </ul>
                </div>

                <!-- Kid Birthday -->
                <div class="price-card" data-aos="fade-up">
                    <h2 class="price-title">Kid Birthday</h2>
                    <ul class="price-list">
                        <li class="price-item">
                            <span class="price-name">La part</span>
                            <span class="price-value">5,30€</span>
                        </li>
                    </ul>
                </div>

   <!-- Notes -->
                <div class="price-card full-width" data-aos="fade-up">
                    <div class="price-icon">ℹ️</div>
                    <h2 class="price-title">Informations Complémentaires</h2>
                    <ul class="price-list info-list">
                        <li class="price-item">P'tites douceurs et autres gourmandises sur devis</li>
                        <li class="price-item">Décorations spécifiques (fleurs, personnages) en supplément</li>
                        <li class="price-item notes">Les parts correspondent à une taille gourmande</li>
                    </ul>
                </div>
            </div>

            <!-- CTA Section -->
            <section class="tarifs-cta">
                <div class="container">
                    <h2 data-aos="fade-up">Envie de découvrir nos créations ?</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Contactez-nous pour toute demande de devis personnalisé</p>
                    <div class="contact-button-container">
                        <a href="<?php echo url('contact.php'); ?>" class="contact-button">
                            Demander un devis
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>