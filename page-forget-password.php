<?php
/**
 * Template Name: Page forget password
 */

get_header(); ?>

  <main class="form-container">

    <form action="#">
      <h2>Mot de passe oublié</h2>

      <p class="description">
        Entrer l'adresse email associé a votre compte ShopNow et nous vous enverrons un code de verification.
        
      </p>

      <div class="form-group">
        <label for="email">Adress Email</label>
        <input type="email" id="email" >
      </div>

      <button type="submit" class="btn-submit">
        <span onclick="window.location.href='code-validate.html';" style="cursor: pointer;">ENVOYER LE CODE</span>
        <i class="fas fa-arrow-right"></i>
      </button>

      <hr class="separator">

      <div class="links-group">
        <p>
          Vous avez deja un compte? <a href="login.html" class="link-sign">Connectez vous</a>
        </p>
        <p>
          Pas de compte <a href="signup.html" class="link-sign">S'inscrire</a>
        </p>
      </div>

      <p class="customer-service-note">
        Vous pourrez contacter <a href="#" class="link-service">le support client</a> pour vous aider à restaurer votre compte.
      </p>
    </form>

  </main>
  

  <?php get_footer(); ?>