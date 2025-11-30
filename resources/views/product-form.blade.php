<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="{{ asset('css/product-form.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">

  <title>Settings</title>
</head>

<body>

  <!--header-->
  <!--<header class="main-header">
    
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

    
    <div class="container main-wrap">
      <button class="hamburger-btn" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="mobile-sidebar">
        <span></span>
        <span></span>
        <span></span>
      </button>
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

    
    <div class="mobile-sidebar" id="mobile-sidebar">
      <div class="mobile-sidebar-header">
        <h3>Menu</h3>
        <button class="close-sidebar" aria-label="Fermer le menu">&times;</button>
      </div>
      <div class="mobile-sidebar-content">
       
        <div class="mobile-nav-section">
          <ul class="mobile-nav-links">
            <li><a href="home.html"><i class="fas fa-house"></i> Home</a></li>
            
            <li><a href="faq.html"><i class="fas fa-question-circle"></i> Service client</a></li>
            <li><a href="about-us.html"><i class="fa-solid fa-users"></i> A propos de nous</a></li>
          </ul>
        </div>

        
        <div class="mobile-nav-section">
          <h4>Toutes les Catégories</h4>
          <div class="accordion">
            <div class="accordion-item">
              <button class="accordion-header">Électronique <i class="fas fa-chevron-down"></i></button>
              <div class="accordion-content">
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
            </div>
            <div class="accordion-item">
              <button class="accordion-header">Vêtements <i class="fas fa-chevron-down"></i></button>
              <div class="accordion-content">
                <a href="#">T-shirts et polos</a>
                <a href="#">Chemises</a>
                <a href="#">Pantalons</a>
                <a href="#">Robes et jupes</a>
                <a href="#">Vestes et manteaux</a>
                <a href="#">Pulls et sweats</a>
                <a href="#">Chaussures</a>
              </div>
            </div>
            <div class="accordion-item">
              <button class="accordion-header">Électroménager <i class="fas fa-chevron-down"></i></button>
              <div class="accordion-content">
                <a href="#">Réfrigérateurs</a>
                <a href="#">Machines à laver</a>
                <a href="#">Fours et cuisinières</a>
                <a href="#">Micro-ondes</a>
                <a href="#">Aspirateurs</a>
                <a href="#">Cafetières</a>
              </div>
            </div>
            <div class="accordion-item">
              <button class="accordion-header">Meubles <i class="fas fa-chevron-down"></i></button>
              <div class="accordion-content">
                <a href="#">Canapés et fauteuils</a>
                <a href="#">Tables</a>
                <a href="#">Chaises</a>
                <a href="#">Lits</a>
                <a href="#">Décoration</a>
              </div>
            </div>
            <div class="accordion-item">
              <button class="accordion-header">Bijoux <i class="fas fa-chevron-down"></i></button>
              <div class="accordion-content">
                <a href="#">Bagues</a>
                <a href="#">Colliers</a>
                <a href="#">Bracelets</a>
                <a href="#">Montres</a>
              </div>
            </div>
            <div class="accordion-item">
              <button class="accordion-header">Cosmétiques <i class="fas fa-chevron-down"></i></button>
              <div class="accordion-content">
                <a href="#">Maquillage</a>
                <a href="#">Soins du visage</a>
                <a href="#">Soins du corps</a>
                <a href="#">Produits capillaires</a>
                <a href="#">Parfums</a>
              </div>
            </div>
          </div>
        </div>

       
        <div class="mobile-nav-section">
          <h4>Paramètres</h4>
          <ul class="mobile-nav-links">
            <li>
              <div class="dropdown">
                <button class="dropdown-btn">Langue: Fr ▾</button>
                <div class="dropdown-content">
                  <a href="#">Français</a>
                  <a href="#">English</a>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <button class="dropdown-btn">Devise: FCFA ▾</button>
                <div class="dropdown-content">
                  <a href="#">FCFA</a>
                  <a href="#">EUR</a>
                  <a href="#">USD</a>
                </div>
              </div>
            </li>
          </ul>
        </div>

       
        <div class="mobile-nav-section">
          <h4>Nous suivre</h4>
          <div class="social">
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>

    
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

  </header>-->

  <div class="container">
    <aside>
      <ul>
        <li onclick="window.location.href='dashboard.html';" style="cursor: pointer;"><i
            class="fa-solid fa-layer-group"></i>Tableau de bord</li>
        <li onclick="window.location.href='order-history.html';" style="cursor: pointer;"><i
            class="fas fa-history"></i>Historique des commandes</li>
        <li onclick="window.location.href='panier.html';" style="cursor: pointer;"><i
            class="fas fa-shopping-cart"></i>Panier</li>
        <li onclick="window.location.href='page-favoris.html';" style="cursor: pointer;"><i
            class="fas fa-heart"></i>Favoris</li>
        <li onclick="window.location.href='profile.html';" style="cursor: pointer;" class="active"><i
            class="fa-solid fa-gear"></i>Setting</li>
        <li><i class="fa-solid fa-right-from-bracket"></i>Log-out</li>
      </ul>
    </aside>
    <div class="main">
      <section class="account-setting">
        <!--<h2>Add A Product</h2>-->
        <h2>{{ isset($product) ? 'Modify A Product' : 'Add A Product' }}</h2>
        <form class="product-form"
          data-product-id="{{ $product->id ?? '' }}"
          data-action="{{ isset($product) ? route('product.update', $product->id) : route('products.store') }}"
          data-method="{{ isset($product) ? 'PUT' : 'POST' }}"
          data-saved-category="{{ old('category', $product->category ?? '') }}"
          data-saved-subcategory="{{ old('subCategory', $product->sub_category ?? '') }}">
        @csrf
        @if(isset($product))
          @method('PUT')
        @endif
        <div class="images-group">
          <div class="form-group">
            <button type="button" class="button primary-button add-image-btn">
              {{ isset($product) ? 'ADD NEW IMAGES' : 'ADD AN IMAGE' }}
            </button>
          </div>
          <div class="uploaded-images">
            @if(isset($product) && is_array($product->images) && count($product->images) > 0)
              @foreach($product->images as $img)
                <div class="form-group uploaded-image existing-image" data-image-path="{{ $img }}">
                  <img src="{{ asset($img) }}" alt="Image actuelle">
                  <span class="delete-old" title="Supprimer cette image">
                    <i class="fa-solid fa-trash"></i>
                  </span>
                </div>
              @endforeach
            @endif
          </div>
        </div>

    <div class="input-group">
        <div class="form-row">
            <div class="form-group full-width">
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName" placeholder="MSI Pulse GL66" value="{{ old('productName', $product->name ?? '') }}" required>
            </div>
            <div class="form-group full-width">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" placeholder="MSI" value="{{ old('brand', $product->brand ?? '') }}" required>
            </div>
        </div>

        <div class="form-row">
    <div class="form-group full-width">
        <label for="category">Category</label>
        <select id="category" name="category" required>
            <option value="">Choisir une catégorie</option>
            @php
                $categories = ['Électronique','Vêtements','Électroménager','Meubles','Bijoux','Cosmétiques'];
                $selectedCategory = old('category', $product->category ?? '');
            @endphp
            @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ $selectedCategory === $cat ? 'selected' : '' }}>
                    {{ $cat }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group full-width">
        <label for="subCategory">Sub-category</label>
        <select id="subCategory" name="subCategory" required>
            <option value="">Choisir une sous-catégorie</option>
        </select>
    </div>
</div>

        <div class="form-row">
            <div class="form-group full-width">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" min="0" required
                                   value="{{ old('stock', $product->stock ?? '') }}"
                                   placeholder="1207">
            </div>
            <div class="form-group full-width">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" min="0" step="100" required
                                   value="{{ old('price', $product->price ?? '') }}"
                                   placeholder="80000">
            </div>
        </div>

        <div class="form-group">
            <label for="smallDescription">Small description</label>
            <input type="text" id="smallDescription" name="smallDescription" required
                               value="{{ old('smallDescription', $product->small_description ?? '') }}"
                               placeholder="Lorem ipsum dolor sit amet.">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="6" required
                                  placeholder="Description détaillée du produit...">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <button type="submit" class="button primary-button save-changes">{{ isset($product) ? 'MODIFY' : 'ADD' }}</button>
    </div>
</form>

      </section>
    </div>
  </div>

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
            <span class="tag">Carte graphique</span><span class="tag">Power Bank</span><span class="tag">Smart
              TV</span>
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

  <script src="{{ asset('js/product-form.js') }}"></script>
  <script src="{{ asset('js/header-footer.js') }}"></script>
</body>

</html>