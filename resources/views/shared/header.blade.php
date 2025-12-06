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
        </div>
      </div>
    </div>

    <!-- Barre principale -->
    <div class="container main-wrap">
      <a class="brand" href="/home">
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
        <a class="icon-btn" href="/panier" title="Panier"><i class="fas fa-shopping-cart"></i><span
            class="badge">2</span></a>
        <a class="icon-btn" href="/page-favoris" title="Favoris"><i class="fas fa-heart"></i></a>
    @if(auth()->check())
        <a class="icon-btn" href="/settings" title="Settings"><i class="fas fa-user"></i></a>
        @if(auth()->user()->role === 'admin')
        <a class="icon-btn" href="{{ route('admin.dashboard') }}" title="Dashboard Admin">
            <i class="fas fa-cogs"></i>
        </a>
        @endif
    @else
        <a class="icon-btn" href="/login" title="Mon compte"><i class="fas fa-user"></i></a>
    @endif
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
        <a href="/home"><i class="fas fa-house"></i> Home </a>
        <a href="/faq"><i class="fas fa-question-circle"></i> Service client</a>
        <a href="/about-us"><i class="fa-solid fa-users"></i> A propos de nous</a>

      </div>

      <div class="right-section">
        <i class="fas fa-phone-alt"></i> +237 - 655 884 341
      </div>
    </div>

  </header>