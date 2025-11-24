<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
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
    <a class="brand" href="<?php echo home_url('/home'); ?>">
      <span class="brand__mark">●</span>
      <span class="brand__name">SHOPNOW</span>
    </a>
    <div class="search" role="search">
      <form action="<?php echo home_url('/recherche'); ?>" method="get">
        <label for="q" class="visually-hidden">Rechercher</label>
        <input id="q" name="q" type="search" placeholder="Que cherchez-vous?" />
        <button type="submit" aria-label="Rechercher"><i class="fas fa-search"></i></button>
      </form>
    </div>
    <div class="actions" aria-label="Actions utilisateur">
      <a class="icon-btn" href="<?php echo home_url('/panier'); ?>" title="Panier"><i class="fas fa-shopping-cart"></i><span class="badge">2</span></a>
      <a class="icon-btn" href="<?php echo home_url('/favoris'); ?>" title="Favoris"><i class="fas fa-heart"></i></a>
      <a class="icon-btn" href="<?php echo home_url('/login'); ?>" title="Mon compte"><i class="fas fa-user"></i></a>
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
          <a href="<?php echo home_url('/liste-produit'); ?>">Smartphones & montres</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Ordinateurs portables</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Ordinateurs gaming</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Tablettes</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Casques & écouteurs</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Télévisions & home cinéma</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Appareils photo & caméras</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Accessoires</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Consoles & manettes</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Composants PC</a>
        </div>
      </li>

      <li class="dropright">
        <span>Vêtements ></span>
        <div class="dropright-content">
          <a href="<?php echo home_url('/liste-produit'); ?>">T-shirts & polos</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Chemises</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Pantalons</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Robes & jupes</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Vestes & manteaux</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Pulls & sweats</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Chaussures</a>
        </div>
      </li>

      <li class="dropright">
        <span>Électroménager ></span>
        <div class="dropright-content">
          <a href="<?php echo home_url('/liste-produit'); ?>">Réfrigérateurs</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Machines à laver</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Fours & cuisinières</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Micro-ondes</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Aspirateurs</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Cafetières</a>
        </div>
      </li>

      <li class="dropright">
        <span>Meubles ></span>
        <div class="dropright-content">
          <a href="<?php echo home_url('/liste-produit'); ?>">Canapés</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Tables</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Chaises</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Lits</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Décoration</a>
        </div>
      </li>

      <li class="dropright">
        <span>Bijoux ></span>
        <div class="dropright-content">
          <a href="<?php echo home_url('/liste-produit'); ?>">Bagues</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Colliers</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Bracelets</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Montres</a>
        </div>
      </li>

      <li class="dropright">
        <span>Cosmétiques ></span>
        <div class="dropright-content">
          <a href="<?php echo home_url('/liste-produit'); ?>">Maquillage</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Soins du visage</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Soins du corps</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Capillaires</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Parfums</a>
        </div>
      </li>
    </ul>
  </div>
</div>

      <a href="<?php echo home_url('/home'); ?>"><i class="fas fa-house"></i> Home </a>
      <a href="<?php echo home_url('/faq'); ?>"><i class="fas fa-question-circle"></i> Service client</a>
      <a href="<?php echo home_url('/about-us'); ?>"><i class="fa-solid fa-users"></i> A propos de nous</a>
    </div>
    <div class="right-section">
      <i class="fas fa-phone-alt"></i> +237 - 655 884 341
    </div>
  </div>
</header>
