document.addEventListener('DOMContentLoaded', function () {
    // script executer apres le chargement de la page
    // selection des images de la page details produit
  const thumbnails = Array.from(document.querySelectorAll('.thumbnails img'));
  // selection de l'image principale et des fleches
  const mainImage = document.querySelector('.main-image img');
  const leftArrow = document.querySelector('.thumbnails .fa-chevron-left');
  const rightArrow = document.querySelector('.thumbnails .fa-chevron-right');
  // index de l'image active
  let currentIndex = thumbnails.findIndex(img => img.classList.contains('active'));

  // fonction pour mettre a jour l'image principale et l'image active
  function updateGallery(index) {
    thumbnails.forEach(img => img.classList.remove('active'));
    thumbnails[index].classList.add('active');
    mainImage.src = thumbnails[index].src;
    mainImage.alt = thumbnails[index].alt;
    currentIndex = index;
  }

  // gestion des clics sur les fleches
  leftArrow.addEventListener('click', function () {
    let newIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
    updateGallery(newIndex);
  });

  rightArrow.addEventListener('click', function () {
    let newIndex = (currentIndex + 1) % thumbnails.length;
    updateGallery(newIndex);
  });


  thumbnails.forEach((img, idx) => {
    img.addEventListener('click', function () {
      updateGallery(idx);
      resetAutoSlide();
    });
  });

  // --- Défilement automatique toutes les 3 secondes ---
  let autoSlideInterval = setInterval(nextImage, 3000);

  function nextImage() {
    let newIndex = (currentIndex + 1) % thumbnails.length;
    updateGallery(newIndex);
  }

  function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(nextImage, 3000);
  }

  // Arrêt et reprise du défilement auto lors d'une interaction utilisateur
  leftArrow.addEventListener('click', resetAutoSlide);
  rightArrow.addEventListener('click', resetAutoSlide);


// gestion de la section de description du produit
const descriptionTab = document.querySelector('.tab-description');
const infoTab = document.querySelector('.tab-info');
const specsTab = document.querySelector('.tab-specs');
const reviewTab = document.querySelector('.tab-review');

const descriptionContent = document.getElementById("description");
const infoContent = document.getElementById("info");
const specsContent = document.getElementById("specs");
const reviewContent = document.getElementById("review");

function showTab(tab, content) {
    // Onglets
    [descriptionTab, infoTab, specsTab, reviewTab].forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    // Contenus
    [descriptionContent, infoContent, specsContent, reviewContent].forEach(c => c.classList.remove('active-content'));
    content.classList.add('active-content');
}

descriptionTab.addEventListener('click', function() {
    showTab(descriptionTab, descriptionContent);
});
infoTab.addEventListener('click', function() {
    showTab(infoTab, infoContent);
});
specsTab.addEventListener('click', function() {
    showTab(specsTab, specsContent);
});
reviewTab.addEventListener('click', function() {
    showTab(reviewTab, reviewContent);
});

// Sélecteur de quantité
    const quantitySelector = document.querySelector('.quantity-selector');
    if (quantitySelector) {
        const minusBtn = quantitySelector.querySelector('button:first-child');
        const plusBtn = quantitySelector.querySelector('button:last-child');
        const quantitySpan = quantitySelector.querySelector('span');
        let quantity = parseInt(quantitySpan.textContent, 10);

        minusBtn.addEventListener('click', function () {
            if (quantity > 1) {
                quantity--;
                quantitySpan.textContent = quantity.toString().padStart(2, '0');
            }
        });

        plusBtn.addEventListener('click', function () {
            quantity++;
            quantitySpan.textContent = quantity.toString().padStart(2, '0');
        });
    }
    
   
});