<?php
/**
 * Template Name: Page login
 */

get_header(); ?>
  <main class="form-container">

    <form action="#">
      <h2>Se connecter</h2>

      <p>
        Entrer votre adresse email et votre mot de passe pour vous connecter
      </p>

      <div class="form-group">
        <label for="password">Adresse email</label>
        <div class="input-wrapper">
          <input type="password" id="password" placeholder="exemple@texte.domaine">

        </div>
      </div>

      <div class="form-group">
        <label for="confirm-password">Mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="confirm-password">

        </div>
      </div>
      

      <button type="submit" class="btn-submit">
        <span>CONNEXION</span>
        <i class="fas fa-arrow-right"></i>
      </button>
      <div class="links-group" style="margin-top: 20px;">
        <p style="text-align: start;">
          <a href="forget-password.html" class="link-sign">Mot de passe oublié ?</a>
        </p>

      </div>

      <hr class="separator">

      <div class="links-group">
        
        <p>
          Pas de compte ? <a href="signup.html" class="link-sign">S'inscrire</a>
        </p>
      </div>
    </form>
  </main>

 <?php get_footer(); ?>