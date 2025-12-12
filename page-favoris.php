<?php
/**
 * Template Name: Page favoris
 */

get_header(); ?>
  <main class="wishlist-container">
    <h2>Produits Favoris</h2>

    <table class="wishlist-table">
      <thead>
        <tr>
          <th scope="col">Produits</th>
          <th scope="col">Prix</th>
          <th scope="col">Etat du stock</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
     <tbody>
  <?php
  // Vérifie que l'utilisateur est connecté
  if (is_user_logged_in()) :

    // Récupère la wishlist de l'utilisateur connecté (YITH)
    $user_id     = get_current_user_id();
    $wishlist    = yith_wcwl_get_wishlist_items($user_id); // retourne un tableau d'objets

    if ($wishlist && count($wishlist) > 0) :

      foreach ($wishlist as $item) :
        $product_id = $item->get_product_id();
        $product    = wc_get_product($product_id);

        if (!$product || !$product->exists()) continue;

        $price_html = $product->get_price_html();
        $in_stock   = $product->is_in_stock();
        $stock_class = $in_stock ? 'in-stock' : 'out-of-stock';
        $stock_text  = $in_stock ? 'En stock' : 'Rupture de stock';
  ?>
        <tr>
          <td data-label="Products">
            <div class="product-info">
              <strong><?php echo esc_html($product->get_name()); ?></strong>
              <span><?php echo wp_kses_post($product->get_short_description()); ?></span>
            </div>
          </td>

          <td data-label="Price">
            <div class="price">
              <span class="current-price"><?php echo $price_html; ?></span>
            </div>
          </td>

          <td data-label="Stock Status">
            <span class="stock-status <?php echo $stock_class; ?>">
              <?php echo $stock_text; ?>
            </span>
          </td>

          <td data-label="Actions">
            <div class="actions">
              <!-- Bouton Ajouter au panier qui fonctionne vraiment -->
              <?php if ($product->is_purchasable() && $in_stock) : ?>
                <button class="btn-add-cart primary add_to_cart_button ajax_add_to_cart"
                        data-product_id="<?php echo $product_id; ?>"
                        data-quantity="1">
                  <i class="fas fa-shopping-cart"></i>
                  <span>Ajouter au panier</span>
                </button>
              <?php else : ?>
                <button class="btn-add-cart primary" disabled>
                  <i class="fas fa-shopping-cart"></i>
                  <span>Indisponible</span>
                </button>
              <?php endif; ?>

              <!-- Bouton Supprimer de la wishlist -->
              <button class="btn-remove yith-wcwl-remove-button"
                      data-product-id="<?php echo $product_id; ?>"
                      title="Retirer des favoris">
                ×
              </button>
            </div>
          </td>
        </tr>

      <?php
      endforeach;

    else : // Wishlist vide
      ?>
      <tr>
        <td colspan="4" style="text-align:center; padding:40px; color:#999;">
          Votre liste de favoris est vide.<br>
          <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">Découvrir nos produits →</a>
        </td>
      </tr>
      <?php
    endif;

  else : // Utilisateur non connecté
    ?>
    <tr>
      <td colspan="4" style="text-align:center; padding:40px; color:#999;">
        Connectez-vous pour voir vos favoris ❤️<br><br>
        <a href="<?php echo wp_login_url(get_permalink()); ?>" class="button">Se connecter</a>
      </td>
    </tr>
  <?php endif; ?>
</tbody>
    </table>
  </main>
  

  <?php get_footer(); ?>