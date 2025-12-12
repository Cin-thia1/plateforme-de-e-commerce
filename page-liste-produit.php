<?php
/**
 * Template Name: Page liste produit
 * 
 */

get_header(); 

// Récupérer la catégorie depuis l'URL
$category_slug = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
$subcategory_slug = isset($_GET['subcategory']) ? sanitize_text_field($_GET['subcategory']) : '';

// Construire les arguments de la requête
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

// Si une sous-catégorie est spécifiée, filtrer par sous-catégorie
if ($subcategory_slug) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $subcategory_slug
        )
    );
}
// Sinon, si une catégorie principale est spécifiée, filtrer par catégorie
elseif ($category_slug) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $category_slug
        )
    );
}

$products_query = new WP_Query($args);

// Récupérer les informations de la catégorie pour l'affichage
$current_category = '';
$breadcrumb_category = 'Tous les produits';
if ($subcategory_slug) {
    $term = get_term_by('slug', $subcategory_slug, 'product_cat');
    if ($term) {
        $current_category = $term->name;
        $breadcrumb_category = $term->name;
        // Récupérer le parent si disponible
        if ($term->parent) {
            $parent_term = get_term($term->parent, 'product_cat');
            $breadcrumb_category = $parent_term->name . ' > ' . $term->name;
        }
    }
} elseif ($category_slug) {
    $term = get_term_by('slug', $category_slug, 'product_cat');
    if ($term) {
        $current_category = $term->name;
        $breadcrumb_category = $term->name;
    }
}
$products = array();

if ($products_query->have_posts()) {
    while ($products_query->have_posts()) {
        $products_query->the_post();
        
        // Récupérer les métadonnées du produit (ajustez selon votre structure)
        $old_price = get_post_meta(get_the_ID(), '_old_price', true);
        $current_price = get_post_meta(get_the_ID(), '_current_price', true);
        $rating = get_post_meta(get_the_ID(), '_rating', true);
        $reviews_count = get_post_meta(get_the_ID(), '_reviews_count', true);
        
        $products[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'full') ?: get_template_directory_uri() . '/assets/images/default-product.png',
            'old_price' => $old_price ? floatval($old_price) : 0,
            'current_price' => $current_price ? floatval($current_price) : 0,
            'rating' => $rating ? floatval($rating) : 4,
            'reviews_count' => $reviews_count ? intval($reviews_count) : 0,
            'badge' => get_post_meta(get_the_ID(), '_badge', true),
            'badge_class' => get_post_meta(get_the_ID(), '_badge_class', true),
            'permalink' => get_permalink()
        );
    }
    wp_reset_postdata();
}

// Fonction helper pour afficher les étoiles
function render_stars($rating) {
    $full_stars = floor($rating);
    $empty_stars = 5 - ceil($rating);
    $stars = str_repeat('★', $full_stars) . str_repeat('☆', $empty_stars);
    return $stars;
}
?>

<div class="category-container">
    <section class="toolbar">
        <div class="container toolbar_row">
            <nav class="breadcrumbs" aria-label="Fil d'Ariane">
                <a href="<?php echo home_url(); ?>">Accueil</a>
                <span aria-hidden="true">></span>
                <?php if ($current_category) : ?>
                    <strong><?php echo esc_html($breadcrumb_category); ?></strong>
                <?php else : ?>
                    <strong>Tous les produits</strong>
                <?php endif; ?>
            </nav>
        </div>
    </section>

    <main class="container layout">
        <aside class="sidebar" aria-label="Filtres de produits">
            <section class="filter">
                <h3 class="filter-title">CATEGORIES</h3>
                <ul class="list-plain" id="filters-categories">
                    <li><label class="cat-option"><input type="checkbox" value="Smartphones & Smartwatchs" /><span>Smartphones & Smartwatchs</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Ordinateurs portables" /><span>Ordinateurs portables</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Ordinateurs gaming" /><span>Ordinateurs gaming</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Tablettes" /><span>Tablettes</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Casques & Ecouteurs" /><span>Casques & Ecouteurs</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Télévisions & Home cinéma" /><span>Télévisions & Home cinéma</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Caméra & Photo" /><span>Caméra & Photo</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Accessoires" /><span>Accessoires</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Consoles de jeux & Manettes" /><span>Consoles de jeux & Manettes</span></label></li>
                    <li><label class="cat-option"><input type="checkbox" value="Composants informatiques" /><span>Composants informatiques</span></label></li>
                </ul>
            </section>
            <hr class="barre">

            <section class="filter">
                <h3 class="filter-title">PLAGE DE PRIX</h3>
                <div class="price-range">
                    <div class="price-inputs">
                        <label>
                            <span class="sr-only">Prix minimum</span>
                            <input type="number" placeholder="Min price" />
                        </label>
                        <span class="sep">—</span>
                        <label>
                            <span class="sr-only">Prix maximum</span>
                            <input type="number" placeholder="Max price" />
                        </label>    
                    </div>
                    <ul class="list-plain pills">
                        <li><label><input type="radio" name="choix-prix" checked value="Tout prix" /> Tout prix</label></li>
                        <li><label><input type="radio" name="choix-prix" value="Moins de 5000 FCFA" /> Moins de 5000 FCFA</label></li>
                        <li><label><input type="radio" name="choix-prix" value="5000 FCFA à 10 000 FCFA" /> 5000 FCFA à 10 000 FCFA</label></li>
                        <li><label><input type="radio" name="choix-prix" value="10 000 FCFA à 50 000 FCFA" /> 10 000 FCFA à 50 000 FCFA</label></li>
                        <li><label><input type="radio" name="choix-prix" value="50 000 FCFA à 100 000 FCFA" /> 50 000 FCFA à 100 000 FCFA</label></li>
                        <li><label><input type="radio" name="choix-prix" value="100 000 FCFA à 500 000 FCFA" /> 100 000 FCFA à 500 000 FCFA</label></li>
                        <li><label><input type="radio" name="choix-prix" value="500 000 FCFA à 1 000 000 FCFA" /> 500 000 FCFA à 1 000 000 FCFA</label></li>
                    </ul>
                </div>
            </section>
            <hr class="barre">

            <section class="filter">
                <h3 class="filter-title">MARQUES</h3>
                <ul class="brand-grid">
                    <li><label><input type="checkbox" value="Apple" /> Apple</label></li>
                    <li><label><input type="checkbox" value="Google" /> Google</label></li>
                    <li><label><input type="checkbox" value="Samsung" /> Samsung</label></li>
                    <li><label><input type="checkbox" value="HP" /> HP</label></li>
                    <li><label><input type="checkbox" value="Sony" /> Sony</label></li>
                    <li><label><input type="checkbox" value="Xiaomi" /> Xiaomi</label></li>
                    <li><label><input type="checkbox" value="LG" /> LG</label></li>
                    <li><label><input type="checkbox" value="TECNO" /> TECNO</label></li>
                    <li><label><input type="checkbox" value="DELL" /> DELL</label></li>
                    <li><label><input type="checkbox" value="Intel" /> Intel</label></li>
                </ul>
            </section>
            <hr class="barre">
        </aside>

        <div class="page-container">
            <div class="separate-product search-bar">
                <form action="/recherche" method="get" class="research-form">
                    <label for="q" class="visually-hidden">Rechercher</label>
                    <input id="q" name="q" type="search" placeholder=" Rechercher un appareil..." />
                    <button type="submit" aria-label="Rechercher"><i class="fas fa-search"></i></button>
                </form>

                <div>
                    <span>Trié par:</span>
                    <select name="" id="" class="option-value">
                        <option value="">Plus populaire</option>
                    </select>
                </div>
            </div>

            <div class="active-filters">
                <div class="filter-apply" id="active-filters">
                    <span class="fonce">Filtres actifs :</span>
                </div>
                <div class="result-active-filters">
                    <?php echo count($products); ?> <span class="fonce">Résultats</span>
                </div>
            </div>

            <section class="product" id="product" aria-label="Liste des produits">
                <?php 
                if (!empty($products)) {
                    foreach ($products as $product) : 
                        $stars = render_stars($product['rating']);
                ?>
                    <article class="product-cart">
                        <?php if ($product['badge']) : ?>
                            <div class="product_cart_badge <?php echo esc_attr($product['badge_class']); ?>">
                                <?php echo esc_html($product['badge']); ?>
                            </div>
                        <?php endif; ?>
                        
                        <a href="<?php echo esc_url($product['permalink']); ?>" class="product-cart_thumb">
                            <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['title']); ?>" />
                        </a>
                        
                        <div class="product-cart_body">
                            <div class="rating" aria-label="Note : <?php echo $product['rating']; ?> sur 5">
                                <span class="stars" aria-hidden="true"><?php echo $stars; ?></span>
                                <span class="count">(<?php echo $product['reviews_count']; ?>)</span>
                            </div>
                            <span><?php echo esc_html($product['title']); ?></span>
                            <div class="price">
                                <?php if ($product['old_price'] > 0) : ?>
                                    <span class="old"><?php echo number_format($product['old_price'], 0, ',', ' '); ?> FCFA</span>
                                <?php endif; ?>
                                <?php if ($product['current_price'] > 0) : ?>
                                    <span class="current"><?php echo number_format($product['current_price'], 0, ',', ' '); ?> FCFA</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="product-cart_actions">
                            <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
                            <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
                            <button 
                                aria-label="Ajouter au panier" 
                                onclick="saveToNavigate('<?php echo esc_js($product['title']); ?>', <?php echo $product['current_price']; ?>, 1)"
                            >
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </div>
                    </article>
                <?php 
                    endforeach;
                } else {
                    echo '<p>Aucun produit trouvé.</p>';
                }
                ?>
            </section>

            <div class="pager" id="pager">
                <nav class="pagination" aria-label="Pagination" id="pagination">
                    <button class="page-nav page-nav--precedente" aria-label="Page précédente">
                        <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                    </button>
                </nav>
                <ol class="page-list" role="list">
                    <!-- Les liens de pagination seront générés par JavaScript -->
                </ol>
                <nav class="pagination" aria-label="Pagination">
                    <button class="page-nav page-nav--suivante" aria-label="Page suivante">
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </nav>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>