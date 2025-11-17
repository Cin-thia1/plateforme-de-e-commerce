<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JBL FLIP - details</title>
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
  <title>JBL Flip — détails produit</title>
  <link rel="stylesheet" href="assets/css/page-details-produit.css">
  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/css/header-footer.css">
</head>
<body>
  <!-- header -->
  <!-- ...existing header markup... -->
  <div class="main-container">
    <div class="product-container">
      <nav class="breadcrumbs"><ul><li><a href="home.html">Accueil</a></li><li><span>&gt;</span></li><li><a href="liste-produit.html">Audio</a></li><li><span>&gt;</span></li><li class="active">JBL Flip</li></ul></nav>

      <main class="product-main">
        <div class="product-gallery">
          <div class="main-image"><img src="assets/images/jbl/thumbnail-main.webp" alt="JBL Flip"></div>
          <div class="thumbnails"><img src="assets/images/jbl/thumbnail-main.webp" class="active" alt=""><img src="assets/images/jbl/thumbnail-1.webp" alt=""></div>
        </div>

        <div class="product-info">
          <div class="rating"><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><span>4.8</span></div>
          <h1>JBL Flip — Enceinte Bluetooth portable étanche</h1>
          <div class="meta-info"><div class="inner-meta-info"><span>SKU: JBLFLIP</span><span>Marque: <b>JBL</b></span></div><div class="inner-meta-info"><span>Disponibilité: <b class="in-stock">En stock</b></span></div></div>
          <div class="price"><span class="current-price">45.000 FCFA</span></div>

          <div class="options">
            <div class="option-group"><label>Couleur</label><div class="colors"><span class="color-swatch active"></span><span class="color-swatch"></span></div></div>
          </div>

          <div class="actions">
            <div class="quantity-selector"><button>-</button><span>01</span><button>+</button></div>
            <button class="btn-add-to-cart" onclick="saveToNavigate('JBL Flip', 45000, 1)">Ajouter au panier</button>
            <button class="btn-buy-now">Acheter maintenant !</button>
          </div>
        </div>
      </main>

      <section class="product-details-tabs">
        <nav class="tabs"><p class="tab-description active">DESCRIPTION</p><p class="tab-info">SPÉCIFICATIONS</p></nav>
        <div class="tab-content">
          <div class="description-content active-content">
            <h3>Description</h3>
            <p>Enceinte Bluetooth portable avec son riche, autonomie longue, IPX7 étanche et compatible JBL PartyBoost.</p>
            <ul><li>Garantie 1 an</li><li>Autonomie jusqu'à 12 heures</li><li>Résistante à l'eau</li></ul>
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