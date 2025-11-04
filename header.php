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
    <a class="brand" href="<?php echo home_url(); ?>">
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
      <a class="icon-btn" href="<?php echo home_url('/page-favoris'); ?>" title="Favoris"><i class="fas fa-heart"></i></a>
      <a class="icon-btn" href="<?php echo home_url('/login'); ?>" title="Mon compte"><i class="fas fa-user"></i></a>
    </div>
  </div>
  <!-- bottom barre -->
  <div class="top-bar">
    <div class="left-section">
      <div class="dropdown">
        <button class="dropdown-btn">Toutes les Catégories</button>
        <div class="dropdown-content">
          <a href="<?php echo home_url('/liste-produit'); ?>">Électronique</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Vêtements</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Électroménager</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Meubles</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Bijoux</a>
          <a href="<?php echo home_url('/liste-produit'); ?>">Cosmétiques</a>
        </div>
      </div>
      <a href="<?php echo home_url(); ?>"><i class="fas fa-house"></i> Home </a>
      <a href="<?php echo home_url('/faq'); ?>"><i class="fas fa-question-circle"></i> Service client</a>
      <a href="<?php echo home_url('/about-us'); ?>"><i class="fa-solid fa-users"></i> A propos de nous</a>
    </div>
    <div class="right-section">
      <i class="fas fa-phone-alt"></i> +237 - 655 884 341
    </div>
  </div>
</header>
