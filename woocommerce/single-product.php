<?php
/**
 * single-produit.php
 * Template personnalisé pour les pages de détail produit WooCommerce
 * Remplace complètement le single-product.php de WooCommerce
 */

get_header();

// Chargement CSS + JS uniquement sur les produits
wp_enqueue_style('details-produit-css', get_template_directory_uri() . '/assets/css/page-details-produit.css', array(), '1.0');
wp_enqueue_script('details-produit-js', get_template_directory_uri() . '/assets/js/page-details-produit.js', array('jquery'), '1.0', true);

global $product;

// Sécurité : s'assurer qu'on a bien un produit WooCommerce
if (!is_singular('product') || !$product || !$product->get_id()) {
    echo '<p class="container">Produit non trouvé.</p>';
    get_footer();
    exit;
}

// Données du produit
$price_html        = $product->get_price_html();
$regular_price     = $product->get_regular_price();
$sale_price        = $product->get_sale_price();
$sku               = $product->get_sku();
$stock_status      = $product->get_stock_status();
$in_stock          = $product->is_in_stock();
$rating            = $product->get_average_rating();
$review_count      = $product->get_review_count();
$short_desc        = $product->get_short_description();
$full_desc         = $product->get_description();
$image_id          = $product->get_image_id();
$gallery_ids       = $product->get_gallery_image_ids();
$attributes        = $product->get_attributes();
$categories        = wc_get_product_category_list($product->get_id(), ', ');
$brand             = wp_get_post_terms($product->get_id(), 'pwb-brand')[0]->name ?? 'Non spécifiée';

// Breadcrumbs
$breadcrumbs = [
    ['url' => home_url(), 'text' => 'Accueil'],
    ['url' => get_permalink(wc_get_page_id('shop')), 'text' => 'Boutique'],
    ['url' => '#', 'text' => strip_tags($categories)],
    ['url' => '', 'text' => get_the_title()]
];

?>

<div class="main-container">
    <div class="product-container">

        <!-- BREADCRUMBS -->
        <nav class="breadcrumbs">
            <ul>
                <?php foreach ($breadcrumbs as $i => $crumb): ?>
                    <li>
                        <?php if ($crumb['url']): ?>
                            <a href="<?php echo esc_url($crumb['url']); ?>"><?php echo esc_html($crumb['text']); ?></a>
                            <span> > </span>
                        <?php else: ?>
                            <span class="active"><?php echo esc_html($crumb['text']); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <main class="product-main">

            <!-- GALERIE -->
            <div class="product-gallery">
                <div class="main-image">
                    <img src="<?php echo $image_id ? wp_get_attachment_image_url($image_id, 'large') : wc_placeholder_img_src(); ?>" 
                         alt="<?php the_title_attribute(); ?>" id="main-product-img">
                </div>

                <?php if ($gallery_ids): ?>
                <div class="thumbnails">
                    <i class="fa fa-chevron-left prev"></i>
                    <?php foreach ($gallery_ids as $i => $id): ?>
                        <img src="<?php echo wp_get_attachment_image_url($id, 'medium'); ?>" 
                             alt="Miniature <?php echo $i + 1; ?>"
                             class="thumb <?php echo $i === 0 ? 'active' : ''; ?>"
                             onclick="document.getElementById('main-product-img').src = this.src">
                    <?php endforeach; ?>
                    <i class="fa fa-chevron-right next"></i>
                </div>
                <?php endif; ?>
            </div>

            <!-- INFOS PRODUIT -->
            <div class="product-info">

                <!-- Rating -->
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fa <?php echo $i <= $rating ? 'fa-star' : ($i - 0.5 <= $rating ? 'fa-star-half-stroke' : 'fa-regular fa-star'); ?>"></i>
                    <?php endfor; ?>
                    <span><?php echo number_format((float)$rating, 1); ?> / 5</span>
                    <span class="reviews">(<?php echo $review_count; ?> avis)</span>
                </div>

                <h1><?php the_title(); ?></h1>
                <hr class="divider">

                <!-- Métadonnées -->
                <div class="meta-info">
                    <div class="inner-meta-info">
                        <span>SKU: <?php echo $sku ?: 'N/A'; ?></span>
                        <span>Marque: <b><?php echo esc_html($brand); ?></b></span>
                    </div>
                    <div class="inner-meta-info">
                        <span>Disponibilité: 
                            <b class="<?php echo $in_stock ? 'in-stock' : 'out-of-stock'; ?>">
                                <?php echo $in_stock ? 'En stock' : 'Rupture de stock'; ?>
                            </b>
                        </span>
                        <span>Catégorie: <b><?php echo strip_tags($categories); ?></b></span>
                    </div>
                </div>

                <!-- Prix -->
                <div class="price">
                    <span class="current-price"><?php echo $price_html; ?></span>
                    <?php if ($sale_price && $sale_price < $regular_price): ?>
                        <span class="original-price"><?php echo wc_price($regular_price); ?></span>
                        <?php $discount = round((($regular_price - $sale_price) / $regular_price) * 100); ?>
                        <span class="discount-badge"><?php echo $discount; ?>% OFF</span>
                    <?php endif; ?>
                </div>

                <!-- Variations (si produit variable) -->
                <?php if ($product->is_type('variable')): ?>
                    <form class="variations_form cart" method="post" enctype="multipart/form-data">
                        <?php foreach ($attributes as $attribute): 
                            if (!$attribute->get_variation()) continue; ?>
                            <div class="option-group">
                                <label><?php echo wc_attribute_label($attribute->get_name()); ?></label>
                                <?php
                                wc_dropdown_variation_attribute_options([
                                    'options'   => $attribute->get_options(),
                                    'attribute' => $attribute->get_name(),
                                    'product'   => $product,
                                    'class'     => 'custom-select'
                                ]);
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </form>
                <?php endif; ?>

                <!-- Actions -->
                <div class="actions">
                    <div class="quantity-selector">
                        <button type="button">-</button>
                        <input type="number" value="1" min="1" class="qty">
                        <button type="button">+</button>
                    </div>

                    <form class="cart" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="add-to-cart" value="<?php echo $product->get_id(); ?>">
                        <input type="hidden" name="quantity" class="input-qty" value="1">
                        <button type="submit" class="btn-add-to-cart">Ajouter au panier</button>
                    </form>

                    <button class="btn-buy-now" onclick="document.querySelector('.cart').submit(); location.href='<?php echo wc_get_checkout_url(); ?>'">
                        Acheter maintenant !
                    </button>
                </div>

                <!-- Actions secondaires -->
                <div class="product-actions-meta">
                    <a href="?add_to_wishlist=<?php echo $product->get_id(); ?>">
                        <i class="fa-regular fa-heart"></i> Ajouter aux favoris
                    </a>
                    <div class="share-product">
                        <span>Partager :</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- ONGLETS -->
        <section class="product-details-tabs">
            <nav class="tabs">
                <p class="tab active" data-tab="desc">DESCRIPTION</p>
                <p class="tab" data-tab="info">INFOS</p>
                <p class="tab" data-tab="specs">CARACTÉRISTIQUES</p>
                <p class="tab" data-tab="reviews">AVIS (<?php echo $review_count; ?>)</p>
            </nav>

            <div class="tab-content">
                <div id="desc" class="tab-pane active">
                    <?php echo wp_kses_post($short_desc ?: $full_desc); ?>
                    <div class="features-list">
                        <h3>Inclus</h3>
                        <ul>
                            <li>2 ans de garantie</li>
                            <li>Livraison gratuite</li>
                            <li>Support 24/7</li>
                        </ul>
                    </div>
                </div>
                <div id="info" class="tab-pane">
                    <p><strong>SKU :</strong> <?php echo $sku ?: 'N/A'; ?></p>
                    <p><strong>Catégories :</strong> <?php echo $categories; ?></p>
                </div>
                <div id="specs" class="tab-pane">
                    <?php foreach ($attributes as $attr): ?>
                        <p><strong><?php echo wc_attribute_label($attr->get_name()); ?> :</strong>
                            <?php echo implode(', ', $attr->get_options()); ?>
                        </p>
                    <?php endforeach; ?>
                </div>
                <div id="reviews" class="tab-pane">
                    <?php comments_template(); ?>
                </div>
            </div>
        </section>

        <!-- PRODUITS SIMILAIRES -->
        <section class="related-products">
            <h2>VOUS POURRIEZ AUSSI AIMER</h2>
            <?php
            $related = wc_get_related_products($product->get_id(), 12);
            if ($related):
            ?>
            <div class="product-grid-container">
                <?php foreach (array_chunk($related, 3) as $chunk): ?>
                    <div class="product-column">
                        <?php foreach ($chunk as $id): 
                            $rel = wc_get_product($id); if (!$rel) continue; ?>
                            <a href="<?php echo get_permalink($id); ?>" class="product-card">
                                <?php echo $rel->get_image('medium'); ?>
                                <div class="product-card-info">
                                    <p><?php echo $rel->get_name(); ?></p>
                                    <span><?php echo $rel->get_price_html(); ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </section>

    </div>
</div>

<?php get_footer(); ?>