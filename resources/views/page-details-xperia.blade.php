<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XPERIA - details</title>
    <!-- Import propre a cette page-->
    <link rel="stylesheet" href="{{ asset('css/page-details-produit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breadcrumbs.css') }}">
    <!-- import commun a toutes les pages-->
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

</head>

<body>

    <!--header-->
    <header class="main-header">
        <!-- Superbar : message + réseaux + langue/devise -->
        <div class="superbar">
            <div class="container super-wrap">
                <div class="super-left">Bienvenu chez SHOPNOW votre boutique de e-commerce en ligne</div>
                <div class="super-right">
                    <div class="social">Nous suivre:
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="dropdown">
                        <div class="pill">Fr ▾</div>
                        <div class="dropdown-content" id="langue">
                            <a href="#">Français</a>
                            <a href="#">English</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <div class="pill">FCFA ▾</div>
                        <div class="dropdown-content" id="devise">
                            <a href="#">FCFA</a>
                            <a href="#">EUR</a>
                            <a href="#">USD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barre principale -->
        <div class="container main-wrap">
            <a class="brand" href="home.html">
                <span class="brand__mark">●</span>
                <span class="brand__name">SHOPNOW</span>
            </a>

            <div class="search" role="search">
                <form action="/recherche" method="get">
                    <label for="q" class="visually-hidden">Rechercher</label>
                    <input id="q" name="q" type="search" placeholder="Que cherchez-vous?" />
                    <button type="submit" aria-label="Rechercher"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="actions" aria-label="Actions utilisateur">
                <a class="icon-btn" href="panier.html" title="Panier"><i class="fas fa-shopping-cart"></i><span
                        class="badge">2</span></a>
                <a class="icon-btn" href="page-favoris.html" title="Favoris"><i class="fas fa-heart"></i></a>
                <a class="icon-btn" href="login.html" title="Mon compte"><i class="fas fa-user"></i></a>
            </div>
        </div>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sony Xperia — détails produit</title>
  <link rel="stylesheet" href="assets/css/page-details-produit.css">
  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/css/header-footer.css">
</head>
<body>
  <!-- header (identique à vos autres pages) -->
  <!-- ...existing header markup... -->
  <div class="main-container">
    <div class="product-container">
      <nav class="breadcrumbs">
        <ul>
          <li><a href="home.html">Accueil</a></li><li><span>&gt;</span></li>
          <li><a href="liste-produit.html">Smartphones</a></li><li><span>&gt;</span></li>
          <li class="active">Sony Xperia 1 V</li>
        </ul>
      </nav>

      <main class="product-main">
        <div class="product-gallery">
          <div class="main-image">
            <img src="assets/images/xperia/thumbnail-main.webp" alt="Sony Xperia 1 V">
          </div>
          <div class="thumbnails">
            <img src="assets/images/xperia/thumbnail-main.webp" alt="Thumbnail main" class="active">
            <img src="assets/images/xperia/thumbnail-1.webp" alt="Thumbnail 1">
            <img src="assets/images/xperia/thumbnail-2.webp" alt="Thumbnail 2">
          </div>
        </div>

        <div class="product-info">
          <div class="rating"><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half-stroke'></i><span>4.6</span></div>
          <h1>Sony Xperia 1 V — Écran 4K OLED, Triple caméra, 12GB RAM</h1>
          <div class="meta-info"><div class="inner-meta-info"><span>SKU: XPR1V</span><span>Marque: <b>SONY</b></span></div><div class="inner-meta-info"><span>Disponibilité: <b class="in-stock">En stock</b></span></div></div>
          <div class="price"><span class="current-price">450.000 FCFA</span></div>

          <div class="options">
            <div class="option-group"><label>Couleur</label><div class="colors"><span class="color-swatch"></span><span class="color-swatch active"></span></div></div>
            <div class="option-group"><label>Stockage</label><select class="custom-select"><option>256GB</option><option>512GB</option></select></div>
          </div>

          <div class="actions">
            <div class="quantity-selector"><button>-</button><span>01</span><button>+</button></div>
            <button class="btn-add-to-cart" onclick="saveToNavigate('Sony Xperia 1 V', 450000, 1)">Ajouter au panier</button>
            <button class="btn-buy-now">Acheter maintenant !</button>
          </div>

          <div class="product-actions-meta"><a href="#"><i class='fa-regular fa-heart'></i> Ajouter au favoris</a></div>
        </div>
      </main>

      <section class="product-details-tabs">
        <nav class="tabs"><p class="tab-description active">DESCRIPTION</p><p class="tab-info">SPÉCIFICATIONS</p><p class="tab-review">REVUES</p></nav>
        <div class="tab-content">
          <div class="description-content active-content">
            <h3>Description</h3>
            <p>Smartphone haut de gamme Sony avec écran 4K OLED, triple caméra professionnelle, stabilisation avancée et batterie longue durée.</p>
            <h3>Inclus</h3>
            <ul><li>2 ans de garantie</li><li>Chargement rapide</li><li>Support client 24/7</li></ul>
          </div>
        </div>
      </section>

    </div>
  </div>

  <!-- footer -->
  <!-- ...existing footer markup... -->

  <script src="{{ asset('js/page-details-produit.js') }}"></script>
</body>
</html>