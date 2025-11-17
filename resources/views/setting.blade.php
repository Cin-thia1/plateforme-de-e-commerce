<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

  <title>Settings</title>
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
            <a href="liste-produit.html">Électronique</a>
            <a href="liste-produit.html">Vêtements</a>
            <a href="liste-produit.html">Électroménager</a>
            <a href="v">Meubles</a>
            <a href="liste-produit.html">Bijoux</a>
            <a href="liste-produit.html">Cosmétiques</a>
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
        <h2>ACCOUNT SETTING</h2>
        <form class="account-details-form">
          <div class="profile-header">
            <div class="profile-picture">
              <img src="./assets/images/avatar-placeholder.png" alt="Photo de profil de Kevin Alex">
            </div>
            <div class="profile-fields">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Kevin">
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Alex">
              </div>
              <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input type="date" id="birthDate" name="birthDate" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="kevin.gilbert@gmail.com" >
              </div>
              <div class="form-group">
                <label for="sex">Sex</label>
                <select id="sex" name="sex">
                  <option value="male" selected>Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="+1-202-555-0118">
              </div>
              <button type="submit" class="button primary-button">SAVE CHANGES</button>
            </div>
            
          </div>
          
        </form>
      </section>

      <div class="settings-two-columns">

        <section class="billing-address">
          <h3>BILLING ADDRESS</h3>
          <form class="address-form">
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" placeholder="Road No. 13/X, House no. 1320/C, Flat No. 5D">
            </div>
            <div class="form-group">
              <label for="regionState">Region/State</label>
              <select id="regionState" name="regionState">
                <option value="" disabled selected>Select...</option>
              </select>
            </div>
            <div class="form-row">
              <div class="form-group half-width">
                <label for="city">City</label>
                <select id="city" name="city">
                  <option value="dhaka" selected>Dhaka</option>
                </select>
              </div>
              <div class="form-group half-width">
                <label for="zipCode">Zip Code</label>
                <input type="text" id="zipCode" name="zipCode" value="1207">
              </div>
            </div>
            <button type="submit" class="button primary-button">SAVE CHANGES</button>
          </form>
        </section>

        <section class="change-password">
          <h3>CHANGE PASSWORD</h3>
          <form class="password-form">
            <div class="form-group">
              <label for="currentPassword">Current Password</label>
              <input type="password" id="currentPassword" name="currentPassword">
            </div>
            <div class="form-group">
              <label for="newPassword">New Password</label>
              <input type="password" id="newPassword" name="newPassword" placeholder="8+ characters">
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" id="confirmPassword" name="confirmPassword">
            </div>
            <button type="submit" class="button primary-button">CHANGE PASSWORD</button>
          </form>
        </section>
      </div>
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

</body>

</html>