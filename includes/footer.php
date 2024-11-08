<footer class="main-footer">
    <div class="footer-container">
        <!-- Logo -->
  <div class="footer-logo">
    <img src="<?php echo url('assets/images/icons/logo-lafabriqueadouceurs.png'); ?>" alt="La Fabrique à Douceurs">
</div>
        
        <!-- Contenu principal du footer -->
        <div class="footer-content">
            <!-- Section Contact -->
            <div class="footer-section">
                <h3>Contact</h3>
                <ul class="contact-info">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="https://maps.app.goo.gl/CRSuSJ453RH6EAE" target="_blank" rel="noopener noreferrer">
                            Héricourt, Franche-Comté
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <a href="tel:+33624665540">‭06 24 66 55 40‬</a>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:lafabriqueadouceurs70@gmail.com">lafabriqueadouceurs70@gmail.com</a>
                    </li>
                </ul>
            </div>
            
            <!-- Section Horaires -->
            <div class="footer-section">
                <h3>Horaires</h3>
                <div class="hours-text">
                    <p>Ouvert tous les jours <span class="hours-emphasis">sur rendez-vous</span></p>
                    <p>Retrait des commandes sur rendez-vous.</p>
                </div>
            </div>
            
            <!-- Section Suivez-nous -->
            <div class="footer-section">
                <h3>Suivez-nous</h3>
                <p>Retrouvez toutes nos créations sur les réseaux sociaux</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=100095251458087" 
                       class="social-link" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       aria-label="Suivez-nous sur Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/sweetnessbyvaness/" 
                       class="social-link" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       aria-label="Suivez-nous sur Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Copyright et mentions légales -->
<div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> La Fabrique à Douceurs - Tous droits réservés - <a href="<?php echo url('mentions-legales.php'); ?>" class="footer-legal-link">Mentions légales</a></p>
    <p class="credits">Site réalisé avec ❤️ par <a href="https://www.idkom.fr" target="_blank" rel="noopener noreferrer">www.idkom.fr</a></p>
</div>
    </div>
</footer>

<!-- JavaScript -->
<script src="/lafabriqueadouceurs/assets/js/main.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du menu burger
    const burgerMenu = document.querySelector('.burger-menu');
    const navMenu = document.querySelector('.nav-menu');
    
    burgerMenu.addEventListener('click', function(e) {
        e.preventDefault();
        navMenu.classList.toggle('active');
        burgerMenu.classList.toggle('active');
    });

    // Gestion des sous-menus sur mobile
    const submenuToggles = document.querySelectorAll('.submenu-toggle');
    
    submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const parentLi = this.closest('.has-submenu');
            const submenu = parentLi.querySelector('.submenu');
            
            // Ferme tous les autres sous-menus
            document.querySelectorAll('.submenu.active').forEach(sub => {
                if (sub !== submenu) {
                    sub.classList.remove('active');
                    sub.previousElementSibling.classList.remove('active');
                }
            });
            
            // Bascule le sous-menu actuel
            submenu.classList.toggle('active');
            this.classList.toggle('active');
        });
    });

    // Fermer le menu si on clique en dehors
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.main-nav')) {
            navMenu.classList.remove('active');
            burgerMenu.classList.remove('active');
            document.querySelectorAll('.submenu.active').forEach(submenu => {
                submenu.classList.remove('active');
            });
            document.querySelectorAll('.submenu-toggle.active').forEach(toggle => {
                toggle.classList.remove('active');
            });
        }
    });

    // Empêcher les liens parents avec sous-menu de naviguer sur mobile
    const hasSubmenuLinks = document.querySelectorAll('.has-submenu > a');
    
    hasSubmenuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
            }
        });
    });
});
</script>

<script src="/lafabriqueadouceurs/assets/js/main.js"></script>
</body>
</html>

<style>
/* Styles complémentaires pour les nouveaux éléments */
.footer-legal-link {
    color: var(--primary);
    transition: color var(--transition-normal) var(--bezier-smooth);
    text-decoration: none;
}

.footer-legal-link:hover {
    color: var(--background);
}

.footer-bottom .credits {
    margin-top: 1rem;
    font-style: italic;
}

.footer-bottom .credits a {
    color: var(--primary);
    transition: color var(--transition-normal) var(--bezier-smooth);
}

.footer-bottom .credits a:hover {
    color: var(--background);
}

@media (max-width: 768px) {
    .footer-bottom p {
        line-height: 1.8;
    }
    
    .footer-bottom .credits {
        margin-top: 0.5rem;
    }
}
</style>