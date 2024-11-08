document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.querySelector('.burger-menu');
    const navMenu = document.querySelector('.nav-menu');
    const hasSubmenuItems = document.querySelectorAll('.has-submenu');

    // Toggle menu burger
    burgerMenu.addEventListener('click', function(e) {
        e.stopPropagation();
        navMenu.classList.toggle('active');
        this.classList.toggle('active');
        
        // Change l'icône
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    });

    // Gestion des sous-menus en mobile
    hasSubmenuItems.forEach(item => {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.submenu');
        
        // Création du bouton toggle pour mobile
        const toggleBtn = document.createElement('button');
        toggleBtn.innerHTML = '<i class="fas fa-chevron-down"></i>';
        toggleBtn.className = 'submenu-toggle';
        link.after(toggleBtn);

        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            submenu.classList.toggle('active');
            this.classList.toggle('active');
        });

        // Le lien principal reste cliquable
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.stopPropagation();
            }
        });
    });

    // Fermeture du menu quand on clique en dehors
    document.addEventListener('click', function(e) {
        if (!navMenu.contains(e.target) && !burgerMenu.contains(e.target)) {
            navMenu.classList.remove('active');
            burgerMenu.classList.remove('active');
            const icon = burgerMenu.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });
});