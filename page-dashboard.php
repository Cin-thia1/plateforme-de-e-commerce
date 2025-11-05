<?php
/**
 * Template Name: Page dashboard
 */

get_header(); ?>

  <div class="container">
    <aside>
      <ul>
        <li class="active" onclick="window.location.href='dashboard.html';" style="cursor: pointer;"><i class="fa-solid fa-layer-group"></i>Tableau de bord</li>
        <li onclick="window.location.href='order-history.html';" style="cursor: pointer;"><i class="fas fa-history"></i>Historique des commandes</li>
        <li onclick="window.location.href='panier.html';" style="cursor: pointer;"><i class="fas fa-shopping-cart"></i>Panier</li>
        <li onclick="window.location.href='page-favoris.html';" style="cursor: pointer;"><i class="fas fa-heart"></i>Favoris</li>
        <li onclick="window.location.href='profile.html';" style="cursor: pointer;"><i class="fa-solid fa-gear"></i>Setting</li>
        <li><i class="fa-solid fa-right-from-bracket"></i>Log-out</li>
      </ul>
    </aside>


      <main class="main">

        <section class="welcome-header">
          <h2>Hello, Kevin</h2>
          <p>
            A partir du tableau de bord de votre compte, vous pouvez facilement verifier vos
            <a href="#">Commandes récentes</a>, gerer vos
            <a href="#">adresses de livraison et de paiement</a> et modifier votre
            <a href="#">Mot de passe</a> et les <a href="#">Informations de votre compte</a>.
          </p>
        </section>

        <section class="info-container">

          <div class="info-card">
            <h3>INFORMATIONS DU COMPTE</h3>
            <div class="account-details">
              <img src="assets/images/avatar-placeholder.png" alt="Profile Picture of Kevin Gilbert" class="profile-pic">
              <p class="name">Kevin Gilbert</p>
              <p class="location">Dhaka - 1207, Bangladesh</p>
              <p class="detail-line"><strong>Email:</strong> kevin.gilbert@gmail.com</p>
              <p class="detail-line"><strong>Phone:</strong> +1 202-555-0118</p>
            </div>
            <button class="btn-secondary">MODIFIER LE COMPTE</button>
          </div>

          <div class="info-card">
            <h3>ADRESSE DE LIVRAISON</h3>
            <div class="address-details">
              <p class="name">Kevin Gilbert</p>
              <p class="location-full">Route de Melen, Word No. 04, Route No. 13/x, Maison no 1380/C,
                Flat No. 5D, Yaounde - 1200, Cameroun</p>
              <p class="detail-line"><strong>Numero de Telephone:</strong> +237 686543626</p>
              <p class="detail-line"><strong>Email:</strong> kevin.gilbert@gmail.com</p>
            </div>
            <button class="btn-secondary">MODIFIER L'ADRESSE</button>
          </div>
          <div class="info-card stat-card-container">

            <div class="stat-card total-orders">
              <div class="stat-value">154</div>
              <div class="stat-label">Total commandes</div>
            </div>

            <div class="stat-card pending-orders">
              <div class="stat-value">05</div>
              <div class="stat-label">Commandes en cours</div>
            </div>

            <div class="stat-card completed-orders">
              <div class="stat-value">149</div>
              <div class="stat-label">Commandes terminees</div>
            </div>
          </div>


        </section>

        <section class="payment-options">
          <h3>OPTION DE PAIEMENT</h3>
          <a href="#" class="add-card-link">Ajouter une carte <i class="fas fa-arrow-right"></i></a>

          <div class="cards-wrapper">

            <div class="credit-card blue-card">
              <div class="card-header">
                <span class="card-balance">95400.00 FCFA</span>
                <div class="menu-icon-wrapper" data-card="card-1">
                  <i class="fas fa-ellipsis-v menu-icon"></i>
                </div>
              </div>
              <div class="card-footer">
                <p class="card-number-label">CARD NUMBER</p>
                <p class="card-number-hidden">**** **** **** 3814</p>
                <div class="card-bottom-line">
                  <i class="fab fa-cc-visa card-logo"></i>
                  <span class="card-holder">Kevin Gilbert</span>
                </div>
              </div>
              <div class="card-menu hidden" id="card-menu-card-1">
                <a href="#" class="menu-option">Modifier</a>
                <a href="#" class="menu-option delete">Supprimer</a>
              </div>
            </div>

            <div class="credit-card green-card">
              <div class="card-header">
                <span class="card-balance">87583.00 FCFA</span>
                <div class="menu-icon-wrapper" data-card="card-2">
                  <i class="fas fa-ellipsis-v menu-icon"></i>
                </div>
              </div>
              <div class="card-footer">
                <p class="card-number-label">CARD NUMBER</p>
                <p class="card-number-hidden">**** **** **** 1761</p>
                <div class="card-bottom-line">
                  <i class="fab fa-cc-mastercard card-logo"></i>
                  <span class="card-holder">Kevin Gilbert</span>
                </div>
              </div>
              <div class="card-menu hidden" id="card-menu-card-2">
                <a href="#" class="menu-option">Modifier</a>
                <a href="#" class="menu-option delete">Supprimer</a>
              </div>
            </div>

          </div>
        </section>

      </main>
  </div>

  
<?php get_footer(); ?>