<footer class="site-footer" role="contentinfo">
  <div class="container footer-top">
    <div class="fgrid">
      <!-- Brand + contact -->
      <div class="fbrand">
        <a class="brand" href="<?php echo esc_url( home_url('/') ); ?>">
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
        <h4>TOP CATÉGORIES</h4>
        
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?categorie=electronique' ); ?>">
          Électronique et Accessoires
        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?categorie=vetements' ); ?>">
          Vêtements
        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?categorie=electromenager' ); ?>">
          Électroménager
        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?categorie=meubles' ); ?>">
          <em>Meubles</em>
        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?categorie=bijoux' ); ?>">
          Bijoux
        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?categorie=cosmetique' ); ?>">
          Cosmétiques
        </a>
        <a class="accent" href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) ); ?>">
          Consulter tous nos produits →
        </a>
      </nav>

      <!-- Quick Links -->
      <nav class="fcol" aria-label="Quick Links">
        <h4>LIENS RAPIDES</h4>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) ); ?>">Catalogue de produits</a>
        <a href="<?php echo esc_url( home_url('/panier') ); ?>">Panier</a>
        <a href="<?php echo esc_url( home_url('/favoris') ); ?>">Liste de souhaits</a>
        <a href="<?php echo esc_url( home_url('/faq') ); ?>">Support client</a>
        <a href="<?php echo esc_url( home_url('/about-us') ); ?>">À propos de nous</a>
      </nav>

      <!-- Popular Tag -->
      <div class="fcol" aria-label="Popular Tag">
        <h4>MOTS POPULAIRES</h4>
        <div class="tags">
          <span class="tag">Réfrigérateurs</span>
          <span class="tag">iPhone</span>
          <span class="tag">TV</span>
          <span class="tag">Asus Laptops</span>
          <span class="tag">Macbook</span>
          <span class="tag">SSD</span>
          <span class="tag">Carte graphique</span>
          <span class="tag">Power Bank</span>
          <span class="tag">Smart TV</span>
          <span class="tag">Enceinte</span>
          <span class="tag">Tablette</span>
          <span class="tag">Microwave</span>
          <span class="tag">Samsung</span>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container foot-wrap">
      <div>ENSPY M1GI ShopNow e-commerce © 2025. Tous droits réservés.</div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>