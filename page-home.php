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
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/xbox.png" alt="" />
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manetteXbox.png" alt="" />
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/xbox2.png" alt="" />
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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pixel6pro.png" alt="" />
          </div>
        </div>
        <div class="bottom">
          <div class="seconds-products-bottom-details">
            <h4>Audemars Piguet</h4>
            <span class="price">750 000 FCFA</span>
            <button class="shop-now"> Achetez <i class="fa-solid fa-arrow-right"></i></button>
          </div>
          <div class="seconds-products-bottom-images">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/audemars.png" alt="" />
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
      <span><a href="<?php echo home_url('/liste-produit'); ?>">Consulter tous les produits ➡</a></span>
    </div>
    <div class="best-deals">
      <div class="all-row-column">
  <?php
    // On récupère 1 produit en promotion de la catégorie électronique
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 1,
        'post__in'       => wc_get_product_ids_on_sale(), // ← uniquement les produits en promo
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'electronique',
            ),
        ),
        'orderby'        => 'rand', // ← change en 'date' si tu veux le plus récent à la place
    );

    $promo_query = new WP_Query($args);

    if ($promo_query->have_posts()) :
      while ($promo_query->have_posts()) : $promo_query->the_post();
        global $product;

        // Calcul du % de réduction
        $regular_price = $product->get_regular_price();
        $sale_price    = $product->get_sale_price();
        $pourcentage   = $regular_price > 0 ? round((($regular_price - $sale_price) / $regular_price) * 100) : 0;
  ?>

    <div class="all-row-column-image">
      <span class="yellow-badge"><?php echo $pourcentage; ?>% OFF</span>
      <?php echo get_the_post_thumbnail(null, 'large'); // ou 'shop_single' si tu veux plus grand ?>
      <span class="stars">★★★★★</span>
    </div>

    <p class="article-desc"><?php the_title(); ?></p>
    
    <span class="lastPrice"><?php echo wc_price($regular_price); ?></span>
    <span class="price"><?php echo wc_price($sale_price); ?></span>

    <p>
      <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
    </p>

    <div class="best-deals-actions">
      <button class="love">
        <i class="fa-solid fa-heart"></i>
      </button>
      <button class="add-to-card"
        onclick="saveToNavigate('<?php the_title(); ?>', <?php echo $sale_price; ?>, 1)">
        <i class="fa-solid fa-cart-shopping"></i>
        Ajouter au panier
      </button>
      <button class="view" onclick="window.location.href='<?php the_permalink(); ?>'">
        <i class="fa-solid fa-eye"></i>
      </button>
    </div>

  <?php
      endwhile;
      wp_reset_postdata();
    else :
      // Au cas où il n’y a aucune promo pour le moment (tu peux remettre une image statique ici si tu veux)
      echo '<p>Aucun produit en promotion pour le moment.</p>';
    endif;
  ?>
</div>
      <!-- grille de produits -->

     <div class="best-deals-items">
    <?php
    // On filtre sur la catégorie "électronique" + 8 produits max
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'electronique', // ← change ici si ton slug est différent
            )
        ),
    );
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
            global $product;
            // On récupère l'ID du produit dans la boucle
            $product_id = get_the_ID(); 
            ?>
            <div class="best-deals-item" data-product-id="<?php echo esc_attr( $product_id ); ?>">
                <a href="<?php echo get_permalink(); ?>" class="product-link">
                    <div class="best-deals-item-image">
                        <span class="gray-badge">Top sale</span>
                        <?php echo get_the_post_thumbnail(null, 'shop_catalog'); ?>
                    </div>
                    <p class="article-desc"><?php the_title(); ?></p>
                    <span class="price"><?php echo $product->get_price_html(); ?></span>
                </a>
            </div>
            <?php
        endwhile;
    }
    wp_reset_postdata(); // plus propre que wp_reset_query() avec WP_Query
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
            <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?category=electronique' ); ?>">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/electronique.jpg" alt="Électronique" />
                </div>
                <span>Électronique</span>
            </a>
        </div>

        <div class="category">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?category=vetements' ); ?>">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vetement.jpeg" alt="Vêtements" />
                </div>
                <span>Vêtements</span>
            </a>
        </div>

        <div class="category">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?category=electromenager' ); ?>">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/electromenager.jpg" alt="Électroménager" />
                </div>
                <span>Électroménager</span>
            </a>
        </div>

        <div class="category">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?category=meubles' ); ?>">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/meuble.jpg" alt="Meubles" />
                </div>
                <span>Meubles</span>
            </a>
        </div>

        <div class="category">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?category=bijoux' ); ?>">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bijoux.jpg" alt="Bijoux" />
                </div>
                <span>Bijoux</span>
            </a>
        </div>

        <div class="category">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path('liste-produit') ) . '?category=cosmetiques' ); ?>">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cosmetique.jpg" alt="Cosmétique" />
                </div>
                <span>Cosmétique</span>
            </a>
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