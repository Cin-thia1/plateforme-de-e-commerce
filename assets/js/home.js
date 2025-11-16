// Attendre que le DOM soit complètement chargé
document.addEventListener('DOMContentLoaded', function () {
  // Sélectionner le carrousel principal
  const carousel = document.querySelector('.first-product');

  // Si le carrousel n'existe pas, arrêter l'exécution
  if (!carousel) return;

  // Récupérer toutes les images du carrousel et les convertir en tableau
  const imgs = Array.from(carousel.querySelectorAll('.first-product-image img'));

  // Récupérer tous les indicateurs (boutons) du carrousel
  const indicators = Array.from(carousel.querySelectorAll('.carousel-indicators button'));

  // Index de l'image actuellement affichée
  let current = 0;

  // Variable pour stocker le timer
  let timer = null;

  // Intervalle entre les slides en millisecondes
  const INTERVAL = 5000;

  /**
   * Fonction pour afficher une image spécifique
   * @param {number} index - Index de l'image à afficher
   */
  function show(index) {
    // Gérer le débordement (boucler si index dépasse les limites)
    index = (index + imgs.length) % imgs.length;

    // Parcourir toutes les images
    imgs.forEach((img, i) => {
      // Afficher seulement l'image correspondante, masquer les autres
      img.style.display = i === index ? 'block' : 'none';

      // Mettre à jour l'attribut ARIA pour l'accessibilité
      img.setAttribute('aria-hidden', i === index ? 'false' : 'true');
    });

    // Mettre à jour les indicateurs visuels
    indicators.forEach((btn, i) => {
      btn.classList.toggle('activeFirstSlide', i === index);
    });

    // Mettre à jour l'index courant
    current = index;
  }

  /**
   * Fonction pour passer à l'image suivante
   */
  function next() {
    show(current + 1);
  }

  /**
   * Démarrer le timer pour le défilement automatique
   */
  function startTimer() {
    stopTimer();
    timer = setInterval(next, INTERVAL);
  }

  /**
   * Arrêter le timer
   */
  function stopTimer() {
    if (timer) {
      clearInterval(timer);
      timer = null;
    }
  }

  /**
   * Redémarrer le timer
   */
  function resetTimer() {
    startTimer();
  }

  // Attacher les écouteurs d'événements aux indicateurs(bouton)
  indicators.forEach((btn, i) => {
    btn.addEventListener('click', () => {
      show(i);
      resetTimer();
    });
  });

  // Initialisation : afficher la première image et démarrer le timer
  show(0);
  startTimer();

  // Mettre en pause au survol
  carousel.addEventListener('mouseenter', stopTimer);
  carousel.addEventListener('mouseleave', startTimer);


  // ...existing code...
  /* ---------- Carousel horizontal "marquee" (défilement continu) pour catégories ---------- */
// 1. Sélectionner le conteneur qui défile
  const itemsCategory = document.querySelector(".items-category");

  // 2. Sélectionner tous les éléments à cloner
  const categories = itemsCategory.querySelectorAll(".category");

  // 3. Boucler sur chaque catégorie pour la cloner
  categories.forEach(category => {
    // Crée un clone exact de l'élément
    const clone = category.cloneNode(true);
    
    // Ajoute le clone à la fin du conteneur
    itemsCategory.appendChild(clone);
  });




  
  // Collections de produits par catégorie
  const PRODUCTS = {
    jewelry: [
      {
        chemin: "./assets/images/ROLEX.PNG",
        stars: "★★★★★",
        description: "Oyster, 36 mm, Oystersteel and yellow gold Reference 126233",
        prix: "15000000"
      },
      {
        chemin: "./assets/images/audemars.png",
        stars: "★★★★★",
        description: "Royal Oak Selfwinding 34 mm Stainless steel 77350ST.ZZ.1261ST.01",
        prix: "12000000"
      },
      {
        chemin: "./assets/images/bague.png",
        stars: "★★★★★",
        description: "Bague Prada en or blanc 18 carats avec diamants",
        prix: "2500000"
      },
      {
        chemin: "./assets/images/cc.png",
        stars: "★★★★★",
        description: "Boucle Coco chanel d'oreille 18 carats avec pendentif en diamant",
        prix: "1800000"
      },
      {
        chemin: "./assets/images/collier.png",
        stars: "★★★★★",
        description: "Collier Dior en or jaune 18 carats avec pendentif en saphir",
        prix: "3500000"
      }
    ],
    electronics: [
      {
        chemin: "./assets/images/samsung-a-56.jpg",
        stars: "★★★★☆",
        description: "Samsung Galaxy A56 5G - 8GB RAM, 256GB",
        prix: "294000"
      },
      {
        chemin: "./assets/images/iphone-12-pro.jpg",
        stars: "★★★★★",
        description: "iPhone 12 Pro - 256GB",
        prix: "312000",
        ancien_prix: "370000"
      },
      {
        chemin: "./assets/images/laptop-13-pro.jpg",
        stars: "★★★★★",
        description: "MacBook Pro 13' M2 - 16GB RAM, 512GB SSD",
        prix: "1500000"
      },
      {
        chemin: "./assets/images/casque-sans-fil.jpg",
        stars: "★★★★★",
        description: "Sony WH-1000XM4 - Casque sans fil à réduction de bruit",
        prix: "312000",
        badge: "BEST DEALS"
      }
    ], clothes: [
      {
        chemin: "https://placehold.co/600x400/5F9EA0/white?text=Veste+Cuir",
        stars: "★★★★★",
        description: "Veste en cuir véritable - Homme, Noir",
        prix: "120000"
      },
      {
        chemin: "https://placehold.co/600x400/FF69B4/white?text=Robe+Ete",
        stars: "★★★★☆",
        description: "Robe d'été légère à motifs floraux - Femme",
        prix: "35000"
      },
      {
        chemin: "https://placehold.co/600x400/00008B/white?text=Jean+Slim",
        stars: "★★★★☆",
        description: "Jean Slim Fit - Bleu délavé",
        prix: "45000",
        ancien_prix: "55000"
      },
      {
        chemin: "https://placehold.co/600x400/EEE/black?text=Baskets+Blanches",
        stars: "★★★★★",
        description: "Baskets en toile - Unisexe, Blanche",
        prix: "28000"
      }
    ],
    appliances: [
      {
        chemin: "https://placehold.co/600x400/F5F5F5/black?text=Refrigerateur",
        stars: "★★★★★",
        description: "Réfrigérateur combiné NoFrost 350L - Classe A+",
        prix: "480000"
      },
      {
        chemin: "https://placehold.co/600x400/B0E0E6/black?text=Lave-linge",
        stars: "★★★★☆",
        description: "Lave-linge frontal 9kg - 1400 tours/min",
        prix: "320000"
      },
      {
        chemin: "https://placehold.co/600x400/2F4F4F/white?text=Machine+Cafe",
        stars: "★★★★★",
        description: "Machine à café Expresso avec broyeur à grains",
        prix: "215000",
        badge: "BEST DEALS"
      },
      {
        chemin: "https://placehold.co/600x400/778899/white?text=Aspirateur",
        stars: "★★★★☆",
        description: "Aspirateur balai sans fil - Autonomie 40 min",
        prix: "180000",
        ancien_prix: "210000"
      }
    ],
    furniture: [
      {
        chemin: "https://placehold.co/600x400/8B4513/white?text=Canape+Angle",
        stars: "★★★★★",
        description: "Canapé d'angle convertible 5 places - Tissu gris",
        prix: "650000"
      },
      {
        chemin: "https://placehold.co/600x400/D2B48C/black?text=Table+Manger",
        stars: "★★★★☆",
        description: "Table à manger en bois massif (Chêne) - 6 couverts",
        prix: "280000"
      },
      {
        chemin: "https://placehold.co/600x400/F5DEB3/black?text=Lit+Double",
        stars: "★★★★☆",
        description: "Lit double 160x200cm avec sommier et tête de lit",
        prix: "310000"
      },
      {
        chemin: "https://placehold.co/600x400/663399/white?text=Bibliotheque",
        stars: "★★★★☆",
        description: "Bibliothèque étagère style industriel - 5 niveaux",
        prix: "95000"
      }
    ],
    cosmetics: [
      {
        chemin: "https://placehold.co/600x400/FFB6C1/black?text=Parfum+Femme",
        stars: "★★★★★",
        description: "Parfum 'La Vie est Belle' - Eau de Parfum 100ml",
        prix: "75000"
      },
      {
        chemin: "https://placehold.co/600x400/E6E6FA/black?text=Creme+Visage",
        stars: "★★★★☆",
        description: "Crème de jour hydratante - Acide hyaluronique 50ml",
        prix: "25000"
      },
      {
        chemin: "httpsS://placehold.co/600x400/CD5C5D/white?text=Rouge+Levres",
        stars: "★★★★★",
        description: "Rouge à lèvres mat 'Rouge Intense' - Longue tenue",
        prix: "18000",
        ancien_prix: "22000"
      },
      {
        chemin: "https://placehold.co/600x400/FAEBD7/black?text=Fond+de+Teint",
        stars: "★★★★☆",
        description: "Fond de teint fluide couvrant - Teinte 'Beige Doré'",
        prix: "32000"
      }
    ]
  };

  // Fonction pour afficher les produits d'une catégorie
  function renderProducts(category = 'electronics') {
    const productList = document.getElementById('product-list');
    if (!productList) return;

    productList.innerHTML = "";

    const products = PRODUCTS[category] || [];

    productList.innerHTML = products.map(product => `
      <article class="product-cart">
        ${product.badge ? `<div class="product_cart_badge badge-${product.badge.toLowerCase().replace(' ', '-')}">${product.badge}</div>` : ''}
        <a href="#" class="product-cart_thumb">
          <img src="${product.chemin}" alt="${product.description}" />
        </a>
        <div class="product-cart_body">
          <div class="rating" aria-label="Note : ${product.stars.length} sur 5">
            <span class="stars" aria-hidden="true">${product.stars}</span>
            <span class="count">(24)</span>
          </div>
          <span>${product.description}</span>
          <div class="price">
            ${product.ancien_prix ? `<span class="lastPrice">${product.ancien_prix} FCFA</span>` : ''}
            <span class="current">${product.prix} FCFA</span>
          </div>
        </div>
      </article>
    `).join('');
  }

  // Attacher les gestionnaires d'événements pour le filtrage par catégorie
  document.querySelectorAll('.result-active-filters span[data-category]').forEach(filter => {
    filter.addEventListener('click', (e) => {
      const category = e.target.dataset.category;
      renderProducts(category);

      // Mise à jour visuelle du filtre actif
      document.querySelectorAll('.result-active-filters span').forEach(span => {
        span.classList.remove('active');
      });
      e.target.classList.add('active');
    });
  });

  // Afficher les produits électroniques par défaut
  renderProducts('electronics');

});