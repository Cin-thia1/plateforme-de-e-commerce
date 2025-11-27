<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Import propre a cette page-->
  <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
  <!-- import commun a toutes les pages-->
  <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome/css/all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/header-footer.css')); ?>">

  <title>Home</title>
</head>

<body>
  <!--header-->
  <?php echo $__env->make('shared.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <main class="container">
    <!-- premiere ligne -->
    <div class="row">
      <div class="widgets">
        <div class="first-product">
          <div class="first-product-details">
            <span> Le meilleur endroit où jouer</span>
            <h3>Consoles XBOX</h3>
            <p> Économiser jusqu'a 30% sur certains jeux XBOX. Obtenez 3 mois gratuits de XBOX Games Pass sur PC pour
              1000 XAF</p>
            <button class="shop-now"> Achetez maintenant <i class="fa-solid fa-arrow-right"></i></button>
            <div class="carousel-indicators">
              <button><i class="fa-solid fa-circle"></i></button>
              <button><i class="fa-solid fa-circle"></i></button>
              <button><i class="fa-solid fa-circle"></i></button>
            </div>
          </div>
          <div class="first-product-image">
            <img src="assets/images/xbox.png" alt="" />
            <img src="assets/images/manetteXbox.png" alt="" />
            <img src="assets/images/xbox2.png" alt="" />
          </div>
        </div>
        <div class="seconds-products">
          <div class="top">
            <div class="seconds-products-top-details">
              <span>Promotion des vacances</span>
              <h4>Nouveau Google Pixel 6 Pro</h4>
              <button class="shop-now"> Achetez <i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="seconds-products-top-images">
              <img src="assets/images/pixel6pro.png" alt="" />
            </div>
          </div>
          <div class="bottom">
            <div class="seconds-products-bottom-details">
              <h4>Audemars Piguet</h4>
              <span class="price">750 000 FCFA</span>
              <button class="shop-now"> Achetez <i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="seconds-products-bottom-images">
              <img src="assets/images/audemars.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="features">
        <div class="charac-features-box">
          <i class="fa-solid fa-box-open"></i>
          <div>
            <h5>Livraison rapide</h5>
            <span>Livraison en 24h</span>
          </div>
        </div>
        <hr />
        <div class="charac-features-box">
          <i class="fa-solid fa-trophy"></i>
          <div>
            <h5>Retours sous 24h</h5>
            <span>Guarantie de rembousement à 100%</span>
          </div>
        </div>
        <hr />
        <div class="charac-features-box">
          <i class="fa-solid fa-credit-card"></i>
          <div>
            <h5>Paiement Sécurisé</h5>
            <span>Votre argent est en sécurité</span>
          </div>
        </div>
        <hr />
        <div class="charac-features-box">
          <i class="fa-solid fa-headset"></i>
          <div>
            <h5>Support 24/7</h5>
            <span>Contact/message en direct</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Deuxieme ligne -->
    <div class="row">
      <div class="head-best-deals">
        <span class="best-deals-title">Le Best de l'éléctronique</span>
        <span><a href="">Consulter tous les produits ➡</a></span>
      </div>
      <div class="best-deals">
        <div class="all-row-column">
          <div class="all-row-column-image">
            <span class="yellow-badge">32% OFF</span>
            <img src="assets/images/ps5.png" alt="" />
            <span class="stars">★★★★★</span>
          </div>
          <p class="article-desc">Sony PlayStation 5 - 512 SSD Console avec manette sans fil - UK Version</p>
          <span class="lastPrice">500000 FCFA</span><span class="price"> 442500 FCFA</span>
          <p>
            Les jeux video developpés avec le Kit de developppement Playstation 5 montre des temps de chargement
            inégalés, des visuels.
          </p>
          <div class="best-deals-actions">
            <button class="love">
              <i class="fa-solid fa-heart"></i>
            </button>
            <button class="add-to-card"
              onclick="saveToNavigate('Sony PlayStation 5 - 512 SSD Console avec manette sans fil - UK Version', 442500, 1)">
              <i class="fa-solid fa-cart-shopping"></i>
              Ajouter au panier
            </button>
            <button class="view">
              <i class="fa-solid fa-eye"></i>
            </button>
          </div>
        </div>
        <!-- grille de produits -->
        <div class="best-deals-items">
          <div class="best-deals-item">
            <a href="page-details-produit.html" class="product-link">
              <div class="best-deals-item-image">
                <span class="gray-badge">Épuisé</span>
                <img src="assets/images/thumbnail-main-1.jpg" alt="ASUS ROG Zephyrus G16" />
              </div>
              <p class="article-desc">ASUS ROG Zephyrus G16 - Intel Core Ultra 9 285H, RTX 5070TI, 32GB RAM, 1TB SSD</p>
              <span class="price">1.316.250 FCFA</span>
            </a>
          </div>

          <div class="best-deals-item">
            <a href="page-details-xperia.html" class="product-link">
              <div class="best-deals-item-image">
                <img src="assets/images/xperia.png" alt="Xperia 1 V" />
              </div>
              <p class="article-desc">Xperia 1 V - Snapdragon 8 Gen 3, 12 Go, 256 Go</p>
              <span class="price">450.000 FCFA</span>
            </a>
          </div>

          <div class="best-deals-item">
            <a href="page-details-imac.html" class="product-link">
              <div class="best-deals-item-image">
                <img src="assets/images/imac.png" alt="iMac" />
              </div>
              <p class="article-desc">iMac MC978LL/A 2011 - core i3-2100, 16Go, 250Go</p>
              <span class="price">1.200.000 FCFA</span>
            </a>
          </div>

          <div class="best-deals-item">
            <a href="page-details-jbl-flip.html" class="product-link">
              <div class="best-deals-item-image">
                <img src="assets/images/jbl.png" alt="JBL Flip" />
              </div>
              <p class="article-desc">JBL Flip — Enceinte Bluetooth portable étanche</p>
              <span class="price">45.000 FCFA</span>
            </a>
          </div>

          <div class="best-deals-item">
            <a href="page-details-dji-mavic.html" class="product-link">
              <div class="best-deals-item-image">
                <img src="assets/images/DJimavic3.png" alt="DJI Mavic" />
              </div>
              <p class="article-desc">DJI Mavic — Drone 4K, stabilisation 3 axes</p>
              <span class="price">990.000 FCFA</span>
            </a>
          </div>

          <div class="best-deals-item">
            <div class="best-deals-item-image">
              <span class="red-badge">Hot</span>
              <img src="assets/images/iphone16.png" alt="iPhone 16" />
            </div>
            <p class="article-desc">iPhone 16 - OLED Super Retina XDR, A18 Bionic</p>
            <span class="price">850.000 FCFA</span>
          </div>
        </div>
      </div>
    </div>
    <!-- troisieme ligne -->
    <div class="row">
      <div class="title-category">
        <p>Nos catégories</p>
      </div>
      <button class="category-previous"><i class="fa-solid fa-chevron-left"></i></button>
      <div class="categories-marquee-viewport">
        <div class="items-category">
          <div class="category">
            <div class="category-image">
              <img src="assets/images/electronique.jpg" alt="" />
            </div>
            <span>Électronique</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/vetement.jpeg" alt="" />
            </div>
            <span>Vêtements</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/electromenager.jpg" alt="" />
            </div>
            <span>Électroménager</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/meuble.jpg" alt="" />
            </div>
            <span>Meubles</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/bijoux.jpg" alt="" />
            </div>
            <span>Bijoux</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/cosmetique.jpg" alt="" />
            </div>
            <span>Cosmetique</span>
          </div>
        </div>
      </div>
      <button class="category-next"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
    <!-- quatrieme ligne -->
    <div class="row">
      <div class="category-container">
        <div class="category-filters">
          <div class="filter-apply">
            <span class="fonce">Toutes les categories : </span>
          </div>
          <div class="result-active-filters">
            <span data-category="electronics" class="active">Électronique</span>
            <span data-category="clothes">Vêtements</span>
            <span data-category="appliances">Électroménager</span>
            <span data-category="furniture">Meuble</span>
            <span data-category="jewelry">Bijoux</span>
            <span data-category="cosmetics">Cosmetique</span>
          </div>
        </div>
        <section id="product-list" class="product" aria-label="Liste des produits">
          <!-- Les produits seront ajoutés ici dynamiquement -->
        </section>
      </div>
    </div>
  </main>

  <!-- footer-->
  <?php echo $__env->make('shared.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <script src="<?php echo e(asset('js/savePanier.js')); ?>"></script>
  <script src="<?php echo e(asset('js/home.js')); ?>"></script>
</body>

</html><?php /**PATH D:\PROGRAMMATION WEB 4\plateforme-de-e-commerce\resources\views/home.blade.php ENDPATH**/ ?>