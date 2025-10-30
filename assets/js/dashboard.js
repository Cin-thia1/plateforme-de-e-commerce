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
});