<?php
/**
 * Template Name: Page detail produit
 */
// On force le CSS uniquement sur cette page
wp_enqueue_style('details-produit-css', get_template_directory_uri() . '/assets/css/page-details-produit.css');
wp_enqueue_script('details-produit-js', get_template_directory_uri() . '/assets/js/page-details-produit.js', array(), null, true);

get_header(); ?>
<div class="main-container">
    <div class="product-container">
        <!--
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="home.html">Accueil</a></li>
                    <li><span>&gt;</span></li>
                    <li><a href="liste-produit.html">Électronique</a></li>
                    <li><span>&gt;</span></li>
                    <li><a href="#">Laptop</a></li>
                    <li><span>&gt;</span></li>
                    <li class="active">ASUS-ROG-G16</li>
                </ul>
            </nav>
-->
        <main class="product-main">
            <?php
            $product = wc_get_product(get_the_ID());
            $featured_id = $product->get_image_id();
            $gallery_ids = $product->get_gallery_image_ids();
            $all_ids = array_merge([$featured_id], $gallery_ids);

            // If no featured image, fallback to a placeholder or handle accordingly
            if (empty($featured_id)) {
                $featured_id = 0; // Or use a default image ID
            }
            if (empty($all_ids)) {
                $all_ids = [$featured_id];
            }

            // Prepare at least 6 image IDs, duplicating if necessary
            $num_images = count($all_ids);
            if ($num_images < 6 && $num_images > 0) {
                $needed = 6 - $num_images;
                for ($i = 0; $i < $needed; $i++) {
                    $all_ids[] = $all_ids[$i % $num_images];
                }
            } elseif ($num_images == 0) {
                // If no images at all, use placeholders or handle error
                // For now, assume at least one
            }

            // Get main image src (larger size)
            $main_src = wp_get_attachment_image_url($featured_id, 'woocommerce_single') ?: 'path/to/placeholder.jpg'; // Add placeholder if needed
            $main_alt = get_post_meta($featured_id, '_wp_attachment_image_alt', true) ?: $product->get_name();

            // Get thumbnail srcs
            $thumb_srcs = [];
            $thumb_alts = [];
            foreach ($all_ids as $index => $id) {
                $thumb_srcs[] = wp_get_attachment_image_url($id, 'woocommerce_thumbnail') ?: 'path/to/placeholder.jpg'; // Add placeholder if needed
                $thumb_alts[] = get_post_meta($id, '_wp_attachment_image_alt', true) ?: $product->get_name() . ' thumbnail ' . $index;
            }
            ?>
            <div class="product-gallery">
                <div class="main-image">
                    <img src="<?php echo esc_url($main_src); ?>" alt="<?php echo esc_attr($main_alt); ?>">
                </div>
                <div class="thumbnails">
                    <i class='fa fa-chevron-left'></i>
                    <img src="<?php echo esc_url($thumb_srcs[0]); ?>" alt="<?php echo esc_attr($thumb_alts[0]); ?>"
                        class="active">
                    <img src="<?php echo esc_url($thumb_srcs[1]); ?>" alt="<?php echo esc_attr($thumb_alts[1]); ?>">
                    <img src="<?php echo esc_url($thumb_srcs[2]); ?>" alt="<?php echo esc_attr($thumb_alts[2]); ?>">
                    <img src="<?php echo esc_url($thumb_srcs[3]); ?>" alt="<?php echo esc_attr($thumb_alts[3]); ?>">
                    <img src="<?php echo esc_url($thumb_srcs[4]); ?>" alt="<?php echo esc_attr($thumb_alts[4]); ?>">
                    <img src="<?php echo esc_url($thumb_srcs[5]); ?>" alt="<?php echo esc_attr($thumb_alts[5]); ?>">
                    <i class='fa fa-chevron-right'></i>
                </div>
            </div>

            <div class="product-info">
                <?php
                $product = wc_get_product(get_the_ID());
                $rating = $product->get_average_rating();
                $review_count = $product->get_review_count();
                $sku = $product->get_sku();
                $stock = $product->get_stock_status();
                $brand = $product->get_attribute('pa_marque') ?: 'ASUS'; // adapte "pa_marque" si besoin
                $category = wp_get_post_terms($product->get_id(), 'product_cat');
                $category_name = !empty($category) ? esc_html($category[0]->name) : 'Ordinateur Gaming';
                ?>

                <div class="rating">
                    <?php
                    // Affichage des étoiles
                    for ($i = 1; $i <= 5; $i++) {
                        if ($rating >= $i) {
                            echo '<i class="fa fa-star"></i>';
                        } elseif ($rating >= $i - 0.5) {
                            echo '<i class="fa fa-star-half-stroke"></i>';
                        } else {
                            echo '<i class="fa fa-star" style="opacity:0.3;"></i>';
                        }
                    }
                    ?>
                    <span><?php echo number_format($rating, 1); ?> - Score d'évaluation</span>
                    <span class="reviews">(<?php echo $review_count; ?> Commentaires)</span>
                </div>

                <h1><?php the_title(); ?></h1>
                <hr class="divider">

                <div class="meta-info">
                    <div class="inner-meta-info">
                        <span>SKU: <?php echo $sku ? esc_html($sku) : '—'; ?></span>
                        <span>Marque: <b><?php echo esc_html($brand); ?></b></span>
                    </div>
                    <div class="inner-meta-info">
                        <span>Disponibilité:
                            <b class="<?php echo $stock === 'instock' ? 'in-stock' : 'out-of-stock'; ?>">
                                <?php echo $stock === 'instock' ? 'En stock' : 'Rupture de stock'; ?>
                            </b>
                        </span>
                        <span>Catégorie: <b><?php echo $category_name; ?></b></span>
                    </div>
                </div>

                <div class="price">
                    <span class="current-price"><?php echo wc_price($product->get_price()); ?></span>
                    <?php if ($product->get_regular_price() && $product->get_regular_price() != $product->get_price()): ?>
                        <span class="original-price"><?php echo wc_price($product->get_regular_price()); ?></span>
                        <?php
                        $discount = round((($product->get_regular_price() - $product->get_price()) / $product->get_regular_price()) * 100);
                        ?>
                        <span class="discount-badge"><?php echo $discount; ?>% OFF</span>
                    <?php endif; ?>
                </div>

                <!-- Section "options" complètement retirée -->

                <div class="actions">
                    <form class="cart" method="post" enctype="multipart/form-data">
                        <div class="quantity-selector">
                            <button type="button" class="minus">-</button>
                            <input type="number" class="qty" value="1" min="1"
                                max="<?php echo $product->get_stock_quantity() ?: ''; ?>">
                            <button type="button" class="plus">+</button>
                        </div>
                        <button type="submit" name="add-to-cart" value="<?php echo $product->get_id(); ?>"
                            class="btn-add-to-cart">
                            Ajouter au panier
                        </button>
                    </form>
                    <a href="?add-to-cart=<?php echo $product->get_id(); ?>" class="btn-buy-now">Acheter maintenant
                        !</a>
                </div>

                <div class="product-actions-meta">
                    <a href="<?php echo esc_url(add_query_arg('add_to_wishlist', $product->get_id())); ?>">
                        <i class="fa-regular fa-heart"></i> Ajouter au favoris
                    </a>
                    <div class="share-product">
                        <span>Partager le produit :</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                                target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"
                                target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                                target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                            <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <section class="product-details-tabs">
            <?php $product = wc_get_product(get_the_ID()); ?>

            <nav class="tabs">
                <p class="tab-description active">DESCRIPTION</p>
                <p class="tab-info">INFORMATIONS ADDITIONNELLES</p>
                <p class="tab-specs">CARACTÉRISTIQUES</p>
                <p class="tab-review">REVUES</p>
            </nav>

            <div class="tab-content">

                <!-- ==================== DESCRIPTION ==================== -->
                <div class="description-content active-content" id="description">
                    <div class="description-text">
                        <h3>Description</h3>
                        <p style="text-align: justify;">
                            <?php
                            // Description courte si vide → on prend la longue
                            echo wp_kses_post($product->get_short_description() ? $product->get_short_description() : $product->get_description());
                            ?>
                        </p>
                    </div>

                    <div class="features-list">
                        <h3>Inclus</h3>
                        <ul>
                            <li><i class='fa fa-trophy'></i> 2 ans de garantie gratuite</li>
                            <li><i class='fa fa-box-open'></i> Livrraison gratuite </li>
                            <li><i class='fa fa-money-bill'></i> 100% de Garantie remboursement</li>
                            <li><i class='fa fa-headphones'></i> 24/7 Support Client</li>
                            <li><i class='fa fa-credit-card'></i> Paiement Sécurisé</li>
                        </ul>
                    </div>

                    <div class="shipping-info">
                        <h3>Information de Livraison</h3>
                        <p><b>Magasin</b> 7-8 Jours, Livraison gratuite</p>
                        <p><b>Dans la ville</b> 2-3 Jours, A partir de FCFA1.500</p>
                        <p><b>Expédition inter-urbaine</b> 4-6 Jours, FCFA5.000</p>
                        <p><b>Livraison Expresse</b>: 8-48 Heures, FCFA10.000</p>
                    </div>
                </div>

                <!-- ==================== INFORMATIONS ADDITIONNELLES ==================== -->
                <div class="description-content" id="info">
                    <?php if ($product->get_description()): ?>
                        <div class="description-text">
                            <h3>Description Complète</h3>
                            <?php echo wp_kses_post(wpautop($product->get_description())); ?>
                        </div>
                    <?php else: ?>
                        <div class="description-text">
                            <p>Aucune information supplémentaire disponible pour le moment.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- ==================== CARACTÉRISTIQUES ==================== -->
                <div class="description-content" id="specs">
                    <?php
                    // Récupère tous les attributs du produit
                    $attributes = $product->get_attributes();
                    $columns = 3;
                    $per_column = ceil(count($attributes) / $columns);
                    $i = 0;
                    ?>

                    <?php for ($col = 0; $col < $columns; $col++): ?>
                        <div class="spec-info">
                            <p>
                                <?php foreach ($attributes as $attribute):
                                    if ($i >= ($col * $per_column) && $i < (($col + 1) * $per_column)):
                                        $label = wc_attribute_label($attribute->get_name());
                                        $values = $product->get_attribute($attribute->get_name());
                                        ?>
                                        <b><?php echo esc_html($label); ?></b> : <?php echo esc_html($values); ?><br>
                                        <?php
                                    endif;
                                    $i++;
                                endforeach; ?>
                            </p>
                        </div>
                    <?php endfor; ?>

                    <?php if (empty($attributes)): ?>
                        <div class="spec-info">
                            <p>Aucune caractéristique technique renseignée pour ce produit.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- ==================== REVUES ==================== -->
                <div class="description-content" id="review">
                    <?php
                    $comments = get_comments(array(
                        'post_id' => $product->get_id(),
                        'status' => 'approve',
                        'type' => 'review',
                        'parent' => 0,
                        'number' => 9, // on prend les 9 derniers avis
                    ));

                    $columns = array_chunk($comments, 3); // 3 colonnes de 3 avis
                    ?>

                    <?php foreach ($columns as $column_comments): ?>
                        <div class="description-text review-column">
                            <?php foreach ($column_comments as $comment):
                                $rating = get_comment_meta($comment->comment_ID, 'rating', true);
                                $author = $comment->comment_author;
                                $avatar = get_avatar_url($comment->user_id, array('size' => 60));
                                $date = mysql2date('d/m/Y', $comment->comment_date);
                                ?>
                                <div class="review-comment">
                                    <div class="review-badge">
                                        <div class="profile-line">
                                            <img class="review-avatar" src="<?php echo esc_url($avatar); ?>"
                                                alt="Photo de <?php echo esc_attr($author); ?>" />
                                            <div class="review-info">
                                                <p class="review-author"><?php echo esc_html($author); ?></p>
                                                <div class="review-stars">
                                                    <?php for ($s = 1; $s <= 5; $s++): ?>
                                                        <i class="fa <?php echo $s <= $rating ? 'fa-star' : 'fa-star'; ?>"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <?php echo wp_kses_post($comment->comment_content); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($comments)): ?>
                        <div class="description-text review-column">
                            <p style="text-align:center; color:#999; font-style:italic;">
                                Aucun avis client pour le moment.<br>
                                Soyez le premier à laisser votre avis !
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </section>

        <section class="related-products">
            <?php
            $product = wc_get_product(get_the_ID());
            $current_id = $product->get_id();

            // 1. Produits liés (WooCommerce Related)
            $related_ids = wc_get_related_products($current_id, 3);

            // 2. Upsells = Accessoires recommandés par toi dans l'onglet "Produits liés" → Upsells
            $upsell_ids = $product->get_upsell_ids();
            if (count($upsell_ids) < 3) {
                $upsell_ids = array_pad($upsell_ids, 3, false);
            } else {
                $upsell_ids = array_slice($upsell_ids, 0, 3);
            }

            // 3. Autres produits de la même marque (ASUS) – on cherche via attribut "marque"
            $brand = $product->get_attribute('pa_marque'); // change "pa_marque" si ton attribut s'appelle autrement
            $brand_products = array();
            if ($brand) {
                $brand_slug = sanitize_title($brand);
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'post__not_in' => array($current_id),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'pa_marque',
                            'field' => 'name',
                            'terms' => $brand,
                        ),
                    ),
                );
                $brand_query = new WP_Query($args);
                $brand_products = wp_list_pluck($brand_query->posts, 'ID');
            }
            if (count($brand_products) < 3) {
                $brand_products = array_pad($brand_products, 3, false);
            }

            // 4. Produits aléatoires ou similaires (fallback si pas assez)
            $random_args = array(
                'post_type' => 'product',
                'posts_per_page' => 3,
                'post__not_in' => array($current_id),
                'orderby' => 'rand',
            );
            $random_query = new WP_Query($random_args);
            $random_ids = wp_list_pluck($random_query->posts, 'ID');

            // On fusionne les 4 colonnes
            $columns = array(
                $related_ids,      // Colonne 1 : Produits liés
                $upsell_ids,       // Colonne 2 : Accessoires
                $brand_products,   // Colonne 3 : Même marque
                $random_ids,       // Colonne 4 : Vous pourriez aimer
            );
            ?>

            <div class="product-grid-header">
                <h2>PRODUITS LIÉS</h2>
                <h2>ACCESSOIRES DU PRODUIT</h2>
                <h2>PRODUIT <?php echo strtoupper($brand ?: 'ASUS'); ?></h2>
                <h2>VOUS POURRIEZ AUSSI AIMER</h2>
            </div>

            <div class="product-grid-container">

                <?php foreach ($columns as $index => $product_ids): ?>
                    <div class="product-column">
                        <?php foreach ($product_ids as $prod_id):
                            if (!$prod_id): ?>
                                <!-- Case vide si pas assez de produits -->
                                <div class="product-card" style="opacity:0.3; pointer-events:none;">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg"
                                        alt="Produit indisponible">
                                    <div class="product-card-info">
                                        <p>Produit bientôt disponible</p>
                                        <span>— FCFA</span>
                                    </div>
                                </div>
                                <?php continue; endif;

                            $related_product = wc_get_product($prod_id);
                            if (!$related_product || !$related_product->is_visible())
                                continue;

                            $image = wp_get_attachment_image_url($related_product->get_image_id(), 'woocommerce_thumbnail') ?: wc_placeholder_img_src();
                            $title = $related_product->get_name();
                            $price = $related_product->get_price_html();
                            ?>
                            <div class="product-card">
                                <a href="<?php echo get_permalink($prod_id); ?>">
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                                    <div class="product-card-info">
                                        <p><?php echo wp_trim_words($title, 10); ?></p>
                                        <span><?php echo $price; ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>

    </div>

</div>


<?php get_footer(); ?>