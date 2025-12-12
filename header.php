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
          <!--
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
-->
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
        <?php
        // Récupérer le nombre d'articles dans le panier pour l'utilisateur actuel (connecté ou non)
        $cart_count = WC()->cart->get_cart_contents_count();
        $badge = ($cart_count > 0) ? '<span class="badge">' . $cart_count . '</span>' : '';
        ?>
        <a class="icon-btn" href="<?php echo home_url('/panier'); ?>" title="Panier"><i
            class="fas fa-shopping-cart"></i><?php echo $badge; ?></a>
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
                <a href="<?php echo home_url('/liste-produit?category=electronique'); ?>">Électronique ></a>
                <div class="dropright-content">
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=smartphones-montres'); ?>">Smartphones
                    & montres</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=ordinateurs-portables'); ?>">Ordinateurs
                    portables</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=ordinateurs-gaming'); ?>">Ordinateurs
                    gaming</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=tablettes'); ?>">Tablettes</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=casques-ecouteurs'); ?>">Casques
                    & écouteurs</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=televisions-home-cinema'); ?>">Télévisions
                    & home cinéma</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=appareils-photo-cameras'); ?>">Appareils
                    photo & caméras</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=accessoires'); ?>">Accessoires</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electronique&subcategory=consoles-manettes'); ?>">Consoles
                    & manettes</a>
                  <a href="<?php echo home_url('/liste-produit?category=electronique&subcategory=composants-pc'); ?>">Composants
                    PC</a>
                </div>
              </li>

              <li class="dropright">
                <a href="<?php echo home_url('/liste-produit?category=vetements'); ?>">Vêtements ></a>
                <div class="dropright-content">
                  <a href="<?php echo home_url('/liste-produit?category=vetements&subcategory=tshirts-polos'); ?>">T-shirts
                    & polos</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=vetements&subcategory=chemises'); ?>">Chemises</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=vetements&subcategory=pantalons'); ?>">Pantalons</a>
                  <a href="<?php echo home_url('/liste-produit?category=vetements&subcategory=robes-jupes'); ?>">Robes &
                    jupes</a>
                  <a href="<?php echo home_url('/liste-produit?category=vetements&subcategory=vestes-manteaux'); ?>">Vestes
                    & manteaux</a>
                  <a href="<?php echo home_url('/liste-produit?category=vetements&subcategory=pulls-sweats'); ?>">Pulls
                    & sweats</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=vetements&subcategory=chaussures'); ?>">Chaussures</a>
                </div>
              </li>

              <li class="dropright">
                <a href="<?php echo home_url('/liste-produit?category=electromenager'); ?>">Électroménager ></a>
                <div class="dropright-content">
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=refrigerateurs'); ?>">Réfrigérateurs</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=machines-laver'); ?>">Machines
                    à laver</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=fours-cuisinieres'); ?>">Fours
                    & cuisinières</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=micro-ondes'); ?>">Micro-ondes</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=aspirateurs'); ?>">Aspirateurs</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=cafetieres'); ?>">Cafetières</a>
                  <a href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=fer-repasser'); ?>">Faire
                    a repasser</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=ventillateurs-climatiseurs'); ?>">Ventillateurs
                    et climatiseurs</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=electromenager&subcategory=petits-appareils-de-soin'); ?>">Petits
                    appareils de soin </a>
                </div>
              </li>

              <li class="dropright">
                <a href="<?php echo home_url('/liste-produit?category=meubles'); ?>">Meubles ></a>
                <div class="dropright-content">
                  <a href="<?php echo home_url('/liste-produit?category=meubles&subcategory=canapes'); ?>">Canapés</a>
                  <a href="<?php echo home_url('/liste-produit?category=meubles&subcategory=tables'); ?>">Tables</a>
                  <a href="<?php echo home_url('/liste-produit?category=meubles&subcategory=chaises'); ?>">Chaises</a>
                  <a href="<?php echo home_url('/liste-produit?category=meubles&subcategory=lits'); ?>">Lits</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=meubles&subcategory=decoration'); ?>">Décoration</a>
                </div>
              </li>

              <li class="dropright">
                <a href="<?php echo home_url('/liste-produit?category=bijoux'); ?>">Bijoux ></a>
                <div class="dropright-content">
                  <a href="<?php echo home_url('/liste-produit?category=bijoux&subcategory=bagues'); ?>">Bagues</a>
                  <a href="<?php echo home_url('/liste-produit?category=bijoux&subcategory=colliers'); ?>">Colliers</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=bijoux&subcategory=bracelets'); ?>">Bracelets</a>
                  <a href="<?php echo home_url('/liste-produit?category=bijoux&subcategory=montres'); ?>">Montres</a>
                </div>
              </li>

              <li class="dropright">
                <a href="<?php echo home_url('/liste-produit?category=cosmetiques'); ?>">Cosmétiques ></a>
                <div class="dropright-content">
                  <a
                    href="<?php echo home_url('/liste-produit?category=cosmetiques&subcategory=maquillage'); ?>">Maquillage</a>
                  <a href="<?php echo home_url('/liste-produit?category=cosmetiques&subcategory=soins-visage'); ?>">Soins
                    du visage</a>
                  <a href="<?php echo home_url('/liste-produit?category=cosmetiques&subcategory=soins-corps'); ?>">Soins
                    du corps</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=cosmetiques&subcategory=capillaires'); ?>">Capillaires</a>
                  <a
                    href="<?php echo home_url('/liste-produit?category=cosmetiques&subcategory=parfums'); ?>">Parfums</a>
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