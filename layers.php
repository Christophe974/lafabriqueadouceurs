<?php 
$pageTitle = "Layers & Co";
require_once __DIR__ . '/includes/config.php';  // Ajout du config
include __DIR__ . '/includes/header.php';       // Chemin absolu
?>
<main>
    <!-- Hero Section -->
    <section class="layers-hero">
        <div class="container">
            <h1 class="layers-title">Layers & Co</h1>
            <p class="layers-subtitle">Des créations gourmandes en plusieurs étages</p>
        </div>
    </section>

    <!-- Description Section -->
    <section class="layers-description">
        <div class="container">
            <div class="layers-intro">
                <p class="layers-lead">
                    Découvrez nos <span class="highlight">Layers & Co</span>, des gâteaux qui sont une invitation 
                    à la gourmandise et à la créativité pâtissière. Chaque couche est soigneusement élaborée 
                    pour ajouter une touche de féérie sucrée à chaque bouchée.
                </p>
            </div>

            <!-- Types de Layers -->
            <div class="layers-types">
                <div class="type-card" data-aos="fade-up">
                    <div class="type-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <h3>Layer Cakes</h3>
                    <p>Des gâteaux colorés offrant une variété infinie de <span class="highlight">saveurs</span> 
                    et de <span class="highlight">décors</span>. Leur construction minutieuse et leur décoration 
                    créative en font de véritables œuvres d'art comestibles.</p>
                </div>

                <div class="type-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="type-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <h3>Drip Cakes</h3>
                    <p>Le <span class="highlight">drip cake</span> se distingue par ses coulures de chocolat 
                    qui dégoulinent le long de son glaçage, offrant une expérience visuellement spectaculaire 
                    et décadente.</p>
                </div>

                <div class="type-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="type-icon">
                        <i class="fas fa-feather"></i>
                    </div>
                    <h3>Nude Cakes</h3>
                    <p>Le <span class="highlight">nude cake</span> incarne la pureté et la simplicité, 
                    mettant en valeur la beauté naturelle des ingrédients de qualité.</p>
                </div>
            </div>

            <!-- Saveurs Section -->
            <div class="flavors-section">
                <h2>Saveurs Personnalisées</h2>
                <div class="flavors-grid">
                    <div class="flavor-card" data-aos="fade-up">
                        <div class="flavor-icon">
                            <i class="fas fa-cookie-bite"></i>
                        </div>
                        <h4>Chocolat avec du croustillant</h4>
                        <p>Pour les amateurs de sensations intenses et texturées</p>
                    </div>

                    <div class="flavor-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="flavor-icon">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h4>Vanille et fruits gourmands</h4>
                        <p>Une alliance fraîche et délicate pour ravir les papilles</p>
                    </div>

                    <div class="flavor-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="flavor-icon">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <h4>Café, praliné</h4>
                        <p>Des saveurs riches et raffinées pour une expérience gustative unique</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Galerie -->
    <section class="layers-gallery">
        <div class="container">
            <h2 class="gallery-title">Nos Créations Layers & Co</h2>
            <div class="gallery-grid">
                <?php
                for($i = 1; $i <= 24; $i++) {
                    $imagePath = url("assets/images/products/layers/Layer{$i}.jpg");
                    echo "
                    <div class='gallery-card' data-aos='zoom-in'>
                        <div class='gallery-image-container'>
                            <img src='{$imagePath}' 
                                 alt='Layer {$i}' 
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
    <section class="layers-cta">
        <div class="container">
            <h2 data-aos="fade-up">Envie d'un Layer Cake unique ?</h2>
            <p data-aos="fade-up" data-aos-delay="100">Créons ensemble votre gâteau d'exception</p>
            <div class="contact-button-container" data-aos="fade-up" data-aos-delay="200">
                <a href="<?php echo url('contact.php'); ?>" class="contact-button">
                    <span class="highlight">Contactez-moi pour votre projet</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
</main>

<script>
let currentIndex = 0;
const images = [];  // Tableau qui contiendra tous les chemins d'images

// Au chargement de la page, stocke tous les chemins d'images
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.gallery-image').forEach(img => {
        images.push(img.src);
    });
});

function openImage(src) {
    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("modalImg");
    
    // Trouve l'index de l'image cliquée
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
    
    // Boucle circulaire
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

// Fermer en cliquant en dehors de l'image
window.onclick = function(event) {
    const modal = document.getElementById("myModal");
    if (event.target == modal) {
        closeModal();
    }
}

// Navigation avec les flèches du clavier
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