<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Panier d'Achat</title>
  <!-- import propre a cette page-->
  <link rel="stylesheet" href="{{ asset('css/panier.css') }}">
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

    <!-- bottom barre -->
    <div class="top-bar">
      <div class="left-section">
        <div class="dropdown">
          <button class="dropdown-btn">Toutes les Catégories</button>
          <div class="dropdown-content">
            <ul>
              <li class="dropright">
                <span>Électronique ></span>
                <div class="dropright-content">
                  <a href="#">Smartphones et montres connectées</a>
                  <a href="#">Ordinateurs portables</a>
                  <a href="#">Ordinateurs gaming</a>
                  <a href="#">Tablettes</a>
                  <a href="#">Casques et écouteurs</a>
                  <a href="#">Télévisions et home cinéma</a>
                  <a href="#">Appareils photo et caméras</a>
                  <a href="#">Accessoires</a>
                  <a href="#">Consoles de jeux et manettes</a>
                  <a href="#">Composants informatiques</a>
                </div>
              </li>

              <li class="dropright">
                <span>Vêtements ></span>
                <div class="dropright-content">
                  <a href="#">T-shirts et polos</a>
                  <a href="#">Chemises</a>
                  <a href="#">Pantalons</a>
                  <a href="#">Robes et jupes</a>
                  <a href="#">Vestes et manteaux</a>
                  <a href="#">Pulls et sweats</a>
                  <a href="#">Chaussures</a>
                </div>
              </li>

              <li class="dropright">
                <span>Électroménager ></span>
                <div class="dropright-content">
                  <a href="#">Réfrigérateurs</a>
                  <a href="#">Machines à laver</a>
                  <a href="#">Fours et cuisinières</a>
                  <a href="#">Micro-ondes</a>
                  <a href="#">Aspirateurs</a>
                  <a href="#">Cafetières</a>
                </div>
              </li>

              <li class="dropright">
                <span>Meubles ></span>
                <div class="dropright-content">
                  <a href="#">Canapés et fauteuils</a>
                  <a href="#">Tables</a>
                  <a href="#">Chaises</a>
                  <a href="#">Lits</a>
                  <a href="#">Décoration</a>
                </div>
              </li>

              <li class="dropright">
                <span>Bijoux ></span>
                <div class="dropright-content">
                  <a href="#">Bagues</a>
                  <a href="#">Colliers</a>
                  <a href="#">Bracelets</a>
                  <a href="#">Montres</a>
                </div>
              </li>

              <li class="dropright">
                <span>Cosmétiques ></span>
                <div class="dropright-content">
                  <a href="#">Maquillage</a>
                  <a href="#">Soins du visage</a>
                  <a href="#">Soins du corps</a>
                  <a href="#">Produits capillaires</a>
                  <a href="#">Parfums</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <a href="home.html"><i class="fas fa-house"></i> Home </a>
        <a href="faq.html"><i class="fas fa-question-circle"></i> Service client</a>
        <a href="about-us.html"><i class="fa-solid fa-users"></i> A propos de nous</a>

      </div>

      <div class="right-section">
        <i class="fas fa-phone-alt"></i> +237 - 655 884 341
      </div>
    </div>

  </header>
  <div class="page-container">

    <div class="cart-wrapper">

      <section class="shopping-cart">
        <h2>Votre Panier</h2>

        <div class="cart-table-container">
          <table class="cart-table" id="panier-table">
            <thead>
              <tr>
                <th class="col-remove"></th>
                <th class="col-product">PRODUITS</th>
                <th class="col-price">PRIX</th>
                <th class="col-qty">QUANTITÉ</th>
                <th class="col-subtotal">SOUS-TOTAL</th>
              </tr>
            </thead>
            <tbody>
              <!-- Les lignes du panier seront insérées ici dynamiquement -->
            </tbody>
          </table>
        </div>

        <div class="cart-actions">
          <button class="btn btn-shop">← RETOUR À LA BOUTIQUE</button>
          <button class="btn btn-update">METTRE À JOUR LE PANIER</button>
        </div>
      </section>

      <aside class="card-totals-section">

        <div class="card-totals">
          <h3>Totaux du Panier</h3>
          <div class="total-row">
            <span class="label">Sous-total</span>
            <span class="value total-sub"></span>
          </div>
          <div class="total-row">
            <span class="label">Livraison</span>
            <span class="value total-shipping">Gratuite</span>
          </div>
          <!--<div class="total-row">
            <span class="label">Réduction</span>
            <span class="value total-discount"></span>
          </div> -->
          <div class="total-row total-tax">
            <span class="label">Taxes (TVA)</span>
            <span class="value total-tax-value"></span>
          </div>
          <div class="total-row total-main">
            <span class="label">Total</span>
            <span class="value total-final"></span>
          </div>

          <button class="btn btn-checkout">PROCÉDER AU PAIEMENT →</button>
        </div>

        <div class="coupon-code">
          <h4>Code Promo</h4>
          <div class="coupon-form">
            <input type="text" placeholder="Entrez votre code promo">
            <button class="btn btn-coupon">APPLIQUER LE COUPON</button>
          </div>
        </div>

      </aside>

    </div>
  </div>
  <!-- footer-->
  <footer class="site-footer" role="contentinfo">
    <div class="container footer-top">
      <div class="fgrid">
        <!-- Brand + contact -->
        <div class="fbrand">
          <a class="brand" href="home.html">
            <span class="brand__mark">●</span>
            <span class="brand__name">SHOPNOW</span>
          </a>
          <div class="contact">
            <div><strong>Service client</strong></div>
            <div>+237-655884341</div>
            <div>Route de Melen, Yaounde<br></div>
            <div><a href="mailto:m1gienspy@gmail.com">m1gienspy@gmail.com</a></div>
          </div>
        </div>

        <!-- Top Category -->
        <nav class="fcol" aria-label="Top Category">
          <h4>TOP CATEGORIES</h4>
          <a href="liste-produit.html">Électronique et Accessoires</a>
          <a href="liste-produit.html">Vêtements</a>
          <a href="liste-produit.html">Électromenager</a>
          <a href="liste-produit.html"><em>Meubles</em></a>
          <a href="liste-produit.html">Bijoux</a>
          <a href="liste-produit.html">Cosmetiques</a>
          <a class="accent" href="liste-produit.html">Consulter tous nos produits →</a>
        </nav>

        <!-- Quick Links -->
        <nav class="fcol" aria-label="Quick Links">
          <h4>LIENS RAPIDES</h4>
          <a href="liste-produit.html">Catalogue de produit</a>
          <a href="panier.html">Panier de course</a>
          <a href="page-favoris.html">Liste de souhait</a>
          <a href="faq.html">Support client</a>
          <a href="about-us.html">A propos de nous</a>


        </nav>

        <!-- Popular Tag -->
        <div class="fcol" aria-label="Popular Tag">
          <h4>MOTS POPULAIRES</h4>
          <div class="tags">
            <span class="tag">Réfregirateurs</span><span class="tag">iPhone</span><span class="tag">TV</span>
            <span class="tag">Asus Laptops</span><span class="tag">Macbook</span><span class="tag">SSD</span>
            <span class="tag">Carte graphique</span><span class="tag">Power Bank</span><span class="tag">Smart TV</span>
            <span class="tag">Enceinte</span><span class="tag">Tablette</span><span class="tag">Microwave</span>
            <span class="tag">Samsung</span>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container foot-wrap">
        <div>ENSPY M1GI ShopNow e-commerce © 2025. All rights reserved.</div>
      </div>
    </div>
  </footer>


  <script src="{{ asset('js/panier.js') }}" defer></script>
  
</body>

</html>

<!--

   
                <tr class="cart-item" data-price="70"> 
                  <td class="col-remove">
                    <button class="remove-btn" title="Supprimer l'article">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </td>
                  <td class="col-product">
                    <p class="product-name">Téléviseur LED Smart TV 4K UHD avec Chromecast intégré</p>
                  </td>
                  <td class="col-price">
                    <del class="old-price">99</del> 
                    <span class="current-price">70</span> 
                  </td>
                  <td class="col-qty">
                    <div class="quantity-control">
                      <button class="qty-minus">-</button>
                      <input type="number" class="qty-input" value="1" min="1"> 
                      <button class="qty-plus">+</button>
                    </div>
                  </td>
                  <td class="col-subtotal subtotal-item-1"></td> 
                </tr>
              
                <tr class="cart-item" data-price="250">
                  <td class="col-remove">
                      <button class="remove-btn" title="Supprimer l'article">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </td>
                  <td class="col-product">
                      <p class="product-name">Casque Gamer filaire Over-Ear avec USB</p>
                  </td>
                  <td class="col-price">250</td> 
                  <td class="col-qty">
                      <div class="quantity-control">
                          <button class="qty-minus">-</button>
                          <input type="number" class="qty-input" value="3" min="1"> 
                          <button class="qty-plus">+</button>
                      </div>
                  </td>
                  <td class="col-subtotal subtotal-item-2"></td> 
                </tr>
                  

-->