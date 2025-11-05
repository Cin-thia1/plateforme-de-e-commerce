<?php
/**
 * Template Name: Page reset password
 */

get_header(); ?>
  <main class="form-container">

    <form action="#">
      <h2>Reinitialiser le mot de passe</h2>

      <p>
        Entrer un nouveau mot de passe robuste, facile à mémoriser
      </p>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="password" placeholder="8+ characters">

        </div>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirmer le mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="confirm-password">

        </div>
      </div>

      <button type="submit" class="btn-submit">
        <span>REINITIALISER</span>
        <i class="fas fa-arrow-right"></i>
      </button>
    </form>

  </main>

  
 <?php get_footer(); ?>