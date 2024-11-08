<?php 
header('Content-Type: text/html; charset=UTF-8');
$pageTitle = "P'tites Douceurs";
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="ptitesdouceurs-hero">
        <div class="container">
            <h1 class="ptitesdouceurs-title">P'tites Douceurs</h1>
            <p class="ptitesdouceurs-subtitle">Des bouchées gourmandes à croquer sans faim</p>
        </div>
    </section>

    <!-- Description Section -->
    <section class="ptitesdouceurs-description">
        <div class="container">
            <div class="ptitesdouceurs-intro">
                <p class="ptitesdouceurs-lead">
                    Craquez pour nos <span class="highlight">P'tites Douceurs</span>, de délicieuses bouchées gourmandes 
                    à croquer sans faim. Idéales pour égayer vos réceptions, vos desserts ou simplement pour un plaisir 
                    sucré à tout moment, ces petites merveilles raviront vos papilles et celles de vos convives.
                </p>
            </div>

            <!-- Types de P'tites Douceurs -->
            <div class="douceurs-types">
                <div class="type-card" data-aos="fade-up">
                    <div class="type-icon">
                        <i class="fas fa-cookie"></i>
                    </div>
                    <h3>Tartelettes</h3>
                    <p>De mini délices aux fruits frais, crèmes onctueuses et pâtes croustillantes.</p>
                </div>

                <div class="type-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="type-icon">
                        <i class="fas fa-circle"></i>
                    </div>
                    <h3>Sphères</h3>
                    <p>Des entremets en forme de sphère, alliant surprise visuelle et explosion de saveurs.</p>
                </div>

                <div class="type-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="type-icon">
                        <i class="fas fa-glass-martini-alt"></i>
                    </div>
                    <h3>Verrines</h3>
                    <p>Des couches gourmandes de mousses, fruits et biscuits présentées élégamment en verrine.</p>
                </div>

                <div class="type-card" data-aos="fade-up">
                    <div class="type-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <h3>Rubik's Cakes</h3>
                    <p>Des gâteaux colorés en forme de cube, inspirés du célèbre Rubik's, pour un effet spectaculaire.</p>
                </div>

                <div class="type-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="type-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <h3>Macarons</h3>
                    <p>Les incontournables macarons, croquants et fondants, déclinés en une multitude de parfums.</p>
                </div>
            </div>

            <!-- Bentos Section -->
            <section class="bentos-section">
                <div class="container">
                    <h2 data-aos="fade-up">Sans oublier les Bentos Cakes</h2>
                    <p class="bentos-intro" data-aos="fade-up">
                        Découvrez également nos <span class="highlight">Bentos Cakes</span>, des layers cakes miniatures 
                        parfaits pour les petites célébrations ou pour offrir en cadeau.
                    </p>
                    
                    <div class="bentos-grid">
                        <div class="bento-card" data-aos="fade-up">
                            <h3>2/3 parts</h3>
                            <p>Idéal pour une dégustation en duo ou en petit comité.</p>
                        </div>
                        
                        <div class="bento-card" data-aos="fade-up" data-aos-delay="100">
                            <h3>5/6 parts</h3>
                            <p>Parfait pour une petite réunion de famille ou entre amis.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

<!-- Galerie -->
    <section class="ptitesdouceurs-gallery">
        <div class="container">
            <h2 class="gallery-title">Nos P'tites Douceurs</h2>
            <div class="gallery-grid">
                <?php
                for($i = 1; $i <= 16; $i++) {
                    $imagePath = url("assets/images/products/ptitesdouceurs/Ptitesdouceurs{$i}.jpg");
                    echo "
                    <div class='gallery-card' data-aos='zoom-in'>
                        <div class='gallery-image-container'>
                            <img src='{$imagePath}' 
                                 alt='P\'tites Douceurs {$i}' 
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
    <section class="ptitesdouceurs-cta">
        <div class="container">
            <h2 data-aos="fade-up">Envie de P'tites Douceurs personnalisées ?</h2>
            <p data-aos="fade-up" data-aos-delay="100">Créons ensemble vos délices sur mesure</p>
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

<?php include __DIR__ . '/includes/footer.php'; ?>