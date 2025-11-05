<?php
/**
 * Template Name: Page signup
 */

get_header(); ?>
  <main class="form-container">

    <form action="#">
      <h2>S'inscrire</h2>

      <p>
        Entrer vos informations pour creer un compte.
      </p>
      <div class="form-group">
        <label for="Nom-prenom">Nom et prénom</label>
        <div class="input-wrapper">
          <input type="password" id="password" placeholder=" arthur simo">

        </div>
      </div>
      <div class="form-group">
        <label for="password">Adresse email</label>
        <div class="input-wrapper">
          <input type="password" id="password" placeholder="exemple@texte.domaine">

        </div>
      </div>

      <div class="form-group">
        <label for="confirm-password">Mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="password">

        </div>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirmer le mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="confirm-password">

        </div>
      </div>
      

      <button type="submit" class="btn-submit">
        <span>INSCRIPTION</span>
        <i class="fas fa-arrow-right"></i>
      </button>
      <hr class="separator">

      <div class="links-group">
        <p>
          Vous avez deja un compte? <a href="login.html" class="link-sign">Connectez vous</a>
        </p>
      </div>
    </form>
  </main>

  <?php get_footer(); ?>