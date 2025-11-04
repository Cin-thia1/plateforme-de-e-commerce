<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Import propre a cette page-->
  <link rel="stylesheet" href="./assets/css/about-us.css">
  <!-- import commun a toutes les pages-->
  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/css/header-footer.css">
  <title>About Us</title>
</head>

<body>
  <!--header-->
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
  <main class="container">
    <!-- first presentation -->
    <div class="row">
      <div class="fist-detail">
        <div>
          <span>Qui sommes nous</span>
          <h3>Etudiant ENSPY M1-GI</h3>
          <p>
            Etudiant a l'Ecole Nationale Superieure Polytechnique de Yaounde, nous sommes passionnés par la conception
            des applications,
            leur implementation et surtout par le developpement web. Nous sommes toujours pret a relever de nouveaux
            defis !
          </p>
        </div>
        <div>
          <ul>
            <li> <i class="fa-solid fa-check"></i> Deux ans d'experiences</li>
            <li> <i class="fa-solid fa-check"></i> Serieux et assiduité</li>
            <li> <i class="fa-solid fa-check"></i> 10+ projets déjà réalisés</li>
          </ul>
        </div>
      </div>
      <div class="Detail-illustration">
        <img src="./assets/images/school.jpg" alt="">
      </div>
    </div>
    <!-- the team -->
    <div class="row">
      <div class="title-team">Notre équipe</div>
      <div class="team">

        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Ndeffeu Arthur</span>
            <span class="member-status">22P690</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Menome Loic</span>
            <span class="member-status">22P680</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Meli Yan</span>
            <span class="member-status">22P624</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Magnye Cabrelle</span>
            <span class="member-status">22P643</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Tsomo Cinthia</span>
            <span class="member-status">22P649</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Yackson Pascal</span>
            <span class="member-status">22P692</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Mafoma marlyse</span>
            <span class="member-status">22P664</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Mboua Mboua</span>
            <span class="member-status">21P473</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">Noutchat Audrey</span>
            <span class="member-status">21P451</span>
          </div>
        </div>
        <div class="member">
          <div class="round-image">
            <img src="./assets/images/unknow.jpg" alt="">
          </div>
          <div class="member-info">
            <span class="member-name">N'godak Salomon</span>
            <span class="member-status">20P437</span>
          </div>
        </div>

      </div>
    </div>
    <!-- troisieme ligne -->
    <!-- Contact Section -->
    <div class="row contact-row">
      <div class="contact-title">
        <span class="contact-us-link">NOUS CONTACTER</span>
        <h2>Vous ne trouvez pas de réponses, Contacter nous !</h2>
      </div>
      <div class="contact-cards">
        <div class="contact-card">
          <div class="icon phone-icon"><i class="fa-solid fa-phone"></i></div>
          <div class="contact-info">
            <h4>Appeler maintenant</h4>
            <p>Nous sommes disponible en ligne de 08:00 a 17:00 (GMT+1). Discutez avec nous sans plus tarder.</p>
            <p class="phone">+237 - 655 884 341</p>
            <button class="call-btn">APPELER MAINTENANT<i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>
        <div class="contact-card">
          <div class="icon chat-icon"><i class="fa-solid fa-comment"></i></div>
          <div class="contact-info">
            <h4>Communiquer avec nous</h4>
            <p>Nous sommes disponible en ligne de 08:00 a 17:00 (GMT+1). Nous écrire dès à présent.</p>
            <p class="email">m1gienspy@gmail.com</p>
            <button class="chat-btn">NOUS CONTACTER <i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </main>


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