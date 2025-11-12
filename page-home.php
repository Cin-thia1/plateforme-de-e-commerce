<?php
/**
 * Template Name: home page
 */
 get_header(); ?>

  <main class="container">
    <!-- premiere ligne -->
    <div class="row">
      <div class="widgets">
        <div class="first-product">
          <div class="first-product-details">
            <span> Le meilleur endroit où jouer</span>
            <h3>Consoles XBOX</h3>
            <p> Économiser jusqu'a 30% sur certains jeux XBOX. Obtenez 3 mois gratuits de XBOX Games Pass sur PC pour
              1000 XAF</p>
            <button class="shop-now"> Achetez maintenant <i class="fa-solid fa-arrow-right"></i></button>
            <div class="carousel-indicators">
              <button><i class="fa-solid fa-circle"></i></button>
              <button><i class="fa-solid fa-circle"></i></button>
              <button><i class="fa-solid fa-circle"></i></button>
            </div>
          </div>
          <div class="first-product-image">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/xbox.png" alt="" />
            <img src="<?php echo get_template_directory_uri();?>/assets/images/manetteXbox.png" alt="" />
            <img src="<?php echo get_template_directory_uri();?>/assets/images/xbox2.png" alt="" />
          </div>
        </div>
        <div class="seconds-products">
          <div class="top">
            <div class="seconds-products-top-details">
              <span>Promotion des vacances</span>
              <h4>Nouveau Google Pixel 6 Pro</h4>
              <button class="shop-now"> Achetez <i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="seconds-products-top-images">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/pixel6pro.png" alt="" />
            </div>
          </div>
          <div class="bottom">
            <div class="seconds-products-bottom-details">
              <h4>Audemars Piguet</h4>
              <span class="price">750 000 FCFA</span>
              <button class="shop-now"> Achetez <i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="seconds-products-bottom-images">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/audemars.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="features">
        <div class="charac-features-box">
          <i class="fa-solid fa-box-open"></i>
          <div>
            <h5>Livraison rapide</h5>
            <span>Livraison en 24h</span>
          </div>
        </div>
        <hr />
        <div class="charac-features-box">
          <i class="fa-solid fa-trophy"></i>
          <div>
            <h5>Retours sous 24h</h5>
            <span>Guarantie de rembousement à 100%</span>
          </div>
        </div>
        <hr />
        <div class="charac-features-box">
          <i class="fa-solid fa-credit-card"></i>
          <div>
            <h5>Paiement Sécurisé</h5>
            <span>Votre argent est en sécurité</span>
          </div>
        </div>
        <hr />
        <div class="charac-features-box">
          <i class="fa-solid fa-headset"></i>
          <div>
            <h5>Support 24/7</h5>
            <span>Contact/message en direct</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Deuxieme ligne -->
    <div class="row">
      <div class="head-best-deals">
        <span class="best-deals-title">Le Best de l'éléctronique</span>
        <span><a href="">Consulter tous les produits ➡</a></span>
      </div>
      <div class="best-deals">
        <div class="all-row-column">
          <div class="all-row-column-image">
            <span class="yellow-badge">32% OFF</span>
            <img src="assets/images/ps5.png" alt="" />
            <span class="stars">★★★★★</span>
          </div>
          <p class="article-desc">Sony PlayStation 5 - 512 SSD Console avec manette sans fil - UK Version</p>
          <span class="lastPrice">500000 FCFA</span><span class="price"> 442500 FCFA</span>
          <p>
            Les jeux video developpés avec le Kit de developppement Playstation 5 montre des temps de chargement
            inégalés, des visuels.
          </p>
          <div class="best-deals-actions">
            <button class="love">
              <i class="fa-solid fa-heart"></i>
            </button>
            <button class="add-to-card"
              onclick="saveToNavigate('Sony PlayStation 5 - 512 SSD Console avec manette sans fil - UK Version', 442500, 1)">
              <i class="fa-solid fa-cart-shopping"></i>
              Ajouter au panier
            </button>
            <button class="view">
              <i class="fa-solid fa-eye"></i>
            </button>
          </div>
        </div>
        <!-- grille de produits -->
         
        <div class="best-deals-items">
          <?php
            // Ou une boucle custom :
            $args = array('post_type' => 'product', 'posts_per_page' => 8);
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
              while ($loop->have_posts()) : $loop->the_post(); global $product;
              ?>
                  <div class="best-deals-item">
                    <a href="<?php echo get_permalink(); ?>" class="product-link">
                      <div class="best-deals-item-image">
                        <span class="gray-badge">Épuisé</span>
                        <?php echo get_the_post_thumbnail(null, 'shop_catalog'); ?>
                    </div>
                  <p class="article-desc"><?php the_title(); ?></p>
                  <span class="price"><?php echo $product->get_price_html(); ?></span>
            </a>
          </div>
            <?php
            endwhile;
          }
        wp_reset_query();
        ?>
        </div>
        </div>
      </div>
    </div>
    <!-- troisieme ligne -->
    <div class="row">
      <div class="title-category">
        <p>Nos catégories</p>
      </div>
      <button class="category-previous"><i class="fa-solid fa-chevron-left"></i></button>
      <div class="categories-marquee-viewport">
        <div class="items-category">
          <div class="category">
            <div class="category-image">
              <img src="assets/images/electronique.jpg" alt="" />
            </div>
            <span>Électronique</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/vetement.jpeg" alt="" />
            </div>
            <span>Vêtements</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/electromenager.jpg" alt="" />
            </div>
            <span>Électroménager</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/meuble.jpg" alt="" />
            </div>
            <span>Meubles</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/bijoux.jpg" alt="" />
            </div>
            <span>Bijoux</span>
          </div>
          <div class="category">
            <div class="category-image">
              <img src="assets/images/cosmetique.jpg" alt="" />
            </div>
            <span>Cosmetique</span>
          </div>
        </div>
      </div>
      <button class="category-next"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
    <!-- quatrieme ligne -->
    <div class="row">
      <div class="category-container">
        <div class="category-filters">
          <div class="filter-apply">
            <span class="fonce">Toutes les categories : </span>
          </div>
          <div class="result-active-filters">
            <span data-category="electronics" class="active">Électronique</span>
            <span data-category="clothes">Vêtements</span>
            <span data-category="appliances">Électroménager</span>
            <span data-category="furniture">Meuble</span>
            <span data-category="jewelry">Bijoux</span>
            <span data-category="cosmetics">Cosmetique</span>
          </div>
        </div>
        <section id="product-list" class="product" aria-label="Liste des produits">
          <!-- Les produits seront ajoutés ici dynamiquement -->
        </section>
      </div>
    </div>
  </main>

<?php get_footer(); ?>