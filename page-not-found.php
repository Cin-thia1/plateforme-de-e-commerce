<?php
/**
 * Template Name: Page not found
 */

get_header(); ?>
  <main class="error-container">

    <img src="assets/images/page-not-found.png" alt="Illustration d'un robot cassé pour erreur 404">

    <h1>404, Page not founds</h1>

    <p>
      Something went wrong. It's look like the link is broken or the page is removed.
    </p>

    <div class="button-group">
      <a href="#" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
        <span>GO BACK</span>
      </a>
      <a href="#" class="btn btn-outline">
        <i class="fas fa-home"></i>
        <span>GO TO HOME</span>
      </a>
    </div>

  </main>

  <?php get_footer(); ?>