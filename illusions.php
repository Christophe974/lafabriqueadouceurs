<?php 
$pageTitle = "Illusions";
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="illusions-hero">
        <div class="container">
            <h1 class="illusions-title">Illusions</h1>
            <p class="illusions-subtitle">L'inattendu s'invite pour le dessert ?</p>
        </div>
    </section>

    <!-- Description Section -->
    <section class="illusions-description">
        <div class="container">
            <div class="illusions-intro">
                <p class="illusions-lead">
                    Découvrez l'art du <span class="highlight">trompe-l'œil culinaire</span> avec de délicieuses petites fraises 
                    au goût acidulé de citron, de petits citrons de mousse au chocolat qui fondent en bouche, 
                    des méga tablettes de chocolat cachant un biscuit ou encore une cagette de fruits qui se dévore entièrement.
                </p>
            </div>

           <!-- Types d'Illusions -->
<div class="illusions-types">
<div class="type-card" data-aos="fade-up">
    <div class="type-icon">
        <i class="fas fa-heart"></i> <!-- Alternative en forme de cœur qui rappelle la forme d'une fraise -->
    </div>
    <h3>Mini Fraises</h3>
    <p>Surprenantes bouchées au goût acidulé de citron, cachées sous l'apparence de délicieuses fraises.</p>
</div>

    <div class="type-card" data-aos="fade-up" data-aos-delay="100">
        <div class="type-icon">
            <i class="fas fa-lemon"></i>
        </div>
        <h3>Citrons Chocolatés</h3>
        <p>De petits citrons qui révèlent une onctueuse mousse au chocolat qui fond en bouche.</p>
    </div>

    <div class="type-card" data-aos="fade-up" data-aos-delay="200">
        <div class="type-icon">
            <i class="fas fa-square"></i>
        </div>
        <h3>Méga Tablettes</h3>
        <p>D'impressionnantes tablettes de chocolat dissimulant un délicieux biscuit à l'intérieur.</p>
    </div>

    <div class="type-card" data-aos="fade-up">
        <div class="type-icon">
            <i class="fas fa-box-open"></i>
        </div>
        <h3>Cagettes Surprises</h3>
        <p>Des cagettes de fruits entièrement comestibles pour une expérience gustative unique.</p>
    </div>
</div>

    <!-- Galerie -->
    <section class="illusions-gallery">
        <div class="container">
            <h2 class="gallery-title">Nos Créations Illusions</h2>
            <div class="gallery-grid">
                <?php
                for($i = 1; $i <= 16; $i++) {
                    $imagePath = url("assets/images/products/illusions/Illusion{$i}.jpg");
                    echo "
                    <div class='gallery-card' data-aos='zoom-in'>
                        <div class='gallery-image-container'>
                            <img src='{$imagePath}' 
                                 alt='Illusion {$i}' 
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

    <!-- Call to Action -->
    <section class="illusions-cta">
        <div class="container">
            <h2 data-aos="fade-up">Envie de surprendre vos invités ?</h2>
            <p data-aos="fade-up" data-aos-delay="100">Créons ensemble des illusions gourmandes qui émerveilleront petits et grands</p>
            <div class="contact-button-container" data-aos="fade-up" data-aos-delay="200">
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

<?php include __DIR__ . '/includes/footer.php'; ?>