<?php 
$pageTitle = "Gourmandises";
require_once __DIR__ . '/includes/config.php';  // Ajout du config
include __DIR__ . '/includes/header.php';       // Chemin absolu
?>

<main>
    <!-- Hero Section -->
    <section class="gourmandises-hero">
        <div class="container">
            <h1 class="gourmandises-title">Nos Gourmandises</h1>
            <p class="gourmandises-subtitle">Des créations sucrées pour enchanter vos papilles</p>
        </div>
    </section>

    <!-- Description Section -->
    <section class="gourmandises-description">
        <div class="container">
            <div class="gourmandises-intro">
                <p class="gourmandises-lead">
                    Bienvenue dans notre univers sucré, où chaque création est pensée pour satisfaire 
                    les envies les plus gourmandes !
                </p>
            </div>

            <!-- Types de Gourmandises -->
            <div class="gourmandises-types">
                <div class="type-card" data-aos="fade-up">
                    <div class="type-icon">
                        <i class="fas fa-candy-cane"></i>
                    </div>
                    <h3>Sucettes au Gianduja</h3>
                    <p>Un pur bonheur à savourer tel quel ou à plonger dans du lait chaud pour un chocolat chaud onctueux.</p>
                    <div class="price">2,50 € la pièce</div>
                </div>

                <div class="type-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="type-icon">
                        <i class="fas fa-jar"></i>
                    </div>
                    <h3>Pâte à Tartiner</h3>
                    <p>Notre recette signature avec 40% de noisettes, riche et onctueuse.</p>
                    <div class="price-list">
                        <div>Verrine dégustation 100g : 3 €</div>
                        <div>Pot gourmand 200g : 5,50 €</div>
                    </div>
                </div>

                <div class="type-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="type-icon">
                        <i class="fas fa-mug-hot"></i>
                    </div>
                    <h3>Coffrets Gourmands Chocolat Chaud</h3>
                    <p>Un kit complet et raffiné pour des moments chocolatés d'exception.</p>
                    <div class="price-list">
                        <div>Solo : 16 €</div>
                        <div>Duo : 28 €</div>
                        <div>La tasse gourmande : 13 €</div>
                    </div>
                </div>
            </div>

            <!-- Note personnalisation -->
            <div class="personalization-note" data-aos="fade-up">
                <p>Tous nos coffrets sont personnalisables selon vos envies et vos thèmes.</p>
            </div>
        </div>
    </section>

<!-- Galerie -->
    <section class="gourmandises-gallery">
        <div class="container">
            <h2 class="gallery-title">Nos Créations Gourmandes</h2>
            <div class="gallery-grid">
                <?php
                for($i = 1; $i <= 14; $i++) {
                    $imagePath = url("assets/images/products/gourmandises/gourmandises{$i}.jpg");
                    echo "
                    <div class='gallery-card' data-aos='zoom-in'>
                        <div class='gallery-image-container'>
                            <img src='{$imagePath}' 
                                 alt='Gourmandises {$i}' 
                                 class='gallery-image'
                                 onclick='openImage(this.src)'
                                 loading='lazy'>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <span class="nav-btn prev" onclick="changeImage(-1)">&#10094;</span>
        <span class="nav-btn next" onclick="changeImage(1)">&#10095;</span>
        <div class="loader"></div>
        <img class="modal-content" id="modalImg" onload="hideLoader()">
    </div>

 <!-- Section CTA -->
    <section class="gourmandises-cta">
        <div class="container">
            <h2 data-aos="fade-up">Envie de découvrir nos douceurs ?</h2>
            <p data-aos="fade-up" data-aos-delay="100">Commandez vos gourmandises préférées</p>
            <div class="contact-button-container">
                <a href="<?php echo url('contact.php'); ?>" class="contact-button">
                    Contactez-moi pour votre commande
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
</main>

<script>
let currentIndex = 0;
const images = [];

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.gallery-image').forEach(img => {
        images.push(img.src);
    });
});

function openImage(src) {
    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("modalImg");
    currentIndex = images.indexOf(src);
    showLoader();
    modal.style.display = "block";
    modalImg.src = src;
}

function closeModal() {
    const modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function changeImage(direction) {
    currentIndex += direction;
    if (currentIndex >= images.length) currentIndex = 0;
    if (currentIndex < 0) currentIndex = images.length - 1;
    const modalImg = document.getElementById("modalImg");
    showLoader();
    modalImg.src = images[currentIndex];
}

function showLoader() {
    document.querySelector('.loader').style.display = 'block';
    document.getElementById('modalImg').style.opacity = '0';
}

function hideLoader() {
    document.querySelector('.loader').style.display = 'none';
    document.getElementById('modalImg').style.opacity = '1';
}

window.onclick = function(event) {
    const modal = document.getElementById("myModal");
    if (event.target == modal) {
        closeModal();
    }
}

document.addEventListener('keydown', function(event) {
    const modal = document.getElementById("myModal");
    if (modal.style.display === "block") {
        switch(event.key) {
            case "ArrowLeft":
                changeImage(-1);
                break;
            case "ArrowRight":
                changeImage(1);
                break;
            case "Escape":
                closeModal();
                break;
        }
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; // Chemin absolu ?>