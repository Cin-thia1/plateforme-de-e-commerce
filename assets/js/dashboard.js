document.addEventListener('DOMContentLoaded', () => {
    // Sélectionne tous les conteneurs d'icônes de menu (les trois points)
    const menuIconWrappers = document.querySelectorAll('.menu-icon-wrapper');
    
    // Ajoute un écouteur d'événements à chaque icône
    menuIconWrappers.forEach(wrapper => {
        wrapper.addEventListener('click', (event) => {
            // Empêche l'événement de se propager et de fermer immédiatement le menu
            event.stopPropagation();
            
            // Récupère l'ID de la carte à partir de l'attribut data-card
            const cardId = wrapper.getAttribute('data-card');
            const menu = document.getElementById(`card-menu-${cardId}`);
            
            // Masque tous les autres menus ouverts
            document.querySelectorAll('.card-menu').forEach(otherMenu => {
                if (otherMenu !== menu) {
                    otherMenu.classList.add('hidden');
                }
            });
            
            // Bascule la classe 'hidden' pour afficher/masquer le menu actuel
            menu.classList.toggle('hidden');
        });
    });

    // Écouteur global pour masquer le menu si l'utilisateur clique n'importe où ailleurs
    document.addEventListener('click', () => {
        document.querySelectorAll('.card-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    });
     
    // ===== MENU MOBILE LATÉRAL =====
    const hamburgerBtn = document.querySelector('.hamburger-btn');
    const mobileSidebar = document.querySelector('.mobile-sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const closeSidebarBtn = document.querySelector('.close-sidebar');
    
    // Fonction pour ouvrir le menu
    function openSidebar() {
        mobileSidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
        hamburgerBtn.classList.add('active');
        document.body.style.overflow = 'hidden'; // Empêche le scroll
    }
    
    // Fonction pour fermer le menu
    function closeSidebar() {
        mobileSidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
        hamburgerBtn.classList.remove('active');
        document.body.style.overflow = ''; // Réactive le scroll
    }
    
    // Event listeners
    if (hamburgerBtn) {
        hamburgerBtn.addEventListener('click', function() {
            if (mobileSidebar.classList.contains('active')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });
    }
    
    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', closeSidebar);
    }
    
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }
    
    // Fermer le menu lors du clic sur un lien
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-links a');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', closeSidebar);
    });
    
    // Fermer le menu avec la touche Échap
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileSidebar.classList.contains('active')) {
            closeSidebar();
        }
    });
    
    
    // ===== MENU CONTEXTUEL DES CARTES DE CRÉDIT =====
    const menuIcons = document.querySelectorAll('.menu-icon-wrapper');
    
    menuIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.stopPropagation();
            const cardId = this.getAttribute('data-card');
            const menu = document.getElementById('card-menu-' + cardId);
            
            // Fermer tous les autres menus
            document.querySelectorAll('.card-menu').forEach(m => {
                if (m !== menu) {
                    m.classList.add('hidden');
                }
            });
            
            // Toggle le menu actuel
            menu.classList.toggle('hidden');
        });
    });
    
    // Fermer les menus de carte en cliquant ailleurs
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.menu-icon-wrapper') && !e.target.closest('.card-menu')) {
            document.querySelectorAll('.card-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
    
    // Gestion des options du menu contextuel
    const menuOptions = document.querySelectorAll('.menu-option');
    menuOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const action = this.textContent.trim().toLowerCase();
            
            if (action === 'supprimer' || action === 'delete') {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette carte ?')) {
                    const card = this.closest('.credit-card');
                    card.style.animation = 'fadeOut 0.3s ease';
                    setTimeout(() => {
                        card.remove();
                    }, 300);
                }
            } else if (action === 'modifier' || action === 'edit') {
                alert('Fonctionnalité de modification à implémenter');
            }
            
            // Fermer le menu
            this.closest('.card-menu').classList.add('hidden');
        });
    });
    
    
    // ===== ANIMATIONS =====
    // Animation de fade out pour les cartes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(0.9);
            }
        }
    `;
    document.head.appendChild(style);
    
    
    // ===== RESPONSIVE ADJUSTMENTS =====
    // Ajuster l'affichage en fonction de la taille de l'écran
    function handleResize() {
        if (window.innerWidth > 768) {
            closeSidebar();
        }
    }
    
    window.addEventListener('resize', handleResize);
    
    
    // ===== SMOOTH SCROLL =====
    // Scroll fluide pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
    
});


// ===== FONCTIONS UTILITAIRES =====

// Fonction pour formater les montants
function formatCurrency(amount) {
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'XAF',
        minimumFractionDigits: 0
    }).format(amount);
}

// Fonction pour tronquer le texte
function truncateText(text, maxLength) {
    if (text.length > maxLength) {
        return text.substring(0, maxLength) + '...';
    }
    return text;
}