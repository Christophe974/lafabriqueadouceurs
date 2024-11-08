<?php 
$pageTitle = "Kids";
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="kids-hero">
        <div class="container">
            <h1 class="kids-title">Kids</h1>
            <p class="kids-subtitle">Des gâteaux magiques qui emerveillent petits et grands</p>
        </div>
    </section>

    <!-- Description Section -->
    <section class="kids-description">
        <div class="container">
            <div class="kids-section" data-aos="fade-up">
                <div class="section-icons">
                    <i class="fas fa-magic"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h2>Une licorne féérique et girly</h2>
                <p class="kids-text">
                    La premiere fois que <span class="highlight">Bénédicte</span> m'a demandé de creer un 
                    <span class="highlight">gâteau licorne</span>, j'étais surprise et, je l'avoue, pas tout 
                    a fait emballée. J'ai même proposé un autre gateau ! Mais la seconde fois... je me suis lancée.
                </p>
                <p class="kids-text">
                    Depuis, la licorne est devenue mon <span class="highlight">best-seller</span> pour les anniversaires 
                    de petites filles, et elles en raffolent ! Chaque création est unique, tout comme chaque petite 
                    fille l'est. Avec son esprit de number cake et ses couleurs féériques, la licorne est désormais 
                    <span class="highlight">incontournable</span>.
                </p>
            </div>

            <div class="kids-section" data-aos="fade-up">
                <div class="section-icons">
                    <i class="fas fa-dog"></i>
                    <i class="fas fa-cat"></i>
                    <i class="fas fa-car"></i>
                    <i class="fas fa-home"></i>
                </div>
                <h2>Dino, Lapins & Co.</h2>
                <p class="kids-text">
                    Depuis le premier <span class="highlight">"Fraisosaure"</span>, l'univers magique s'est enrichi 
                    pour accueillir le Herisson, le Renard, le Papillon, la Voiture, les Lapins, le Chateau Fort et 
                    bien d'autres <span class="highlight">créations magiques</span>, pour le plus grand plaisir des 
                    petits et des grands.
                </p>
            </div>
        </div>
    </section>

    <!-- Galerie -->
    <section class="kids-gallery">
        <div class="container">
            <h2 class="gallery-title">Nos Créations Magiques</h2>
            <div class="gallery-grid">
                <?php
                for($i = 1; $i <= 20; $i++) {
                    $imagePath = url("assets/images/products/kids/Kid{$i}.jpg");
                    echo "
                    <div class='gallery-card' data-aos='zoom-in'>
                        <div class='gallery-image-container'>
                            <img src='{$imagePath}' 
                                 alt='Kid {$i}' 
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
    <section class="kids-cta">
        <div class="container">
            <h2 data-aos="fade-up">Envie d'un gâteau magique personnalisé ?</h2>
            <p data-aos="fade-up" data-aos-delay="100">Créons ensemble le gâteau de rêve pour votre enfant</p>
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

<style>
.section-icons {
    font-size: 2rem;
    color: var(--primary-dark);
    margin-bottom: 1.5rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.section-icons i {
    transition: transform 0.3s ease;
}

.section-icons i:hover {
    transform: scale(1.2);
}
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>