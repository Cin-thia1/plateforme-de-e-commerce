<?php
/**
 * Functions.php - Thème ShopNow (propre & optimisé)
 */

/* ==============================================================
   1. ENQUEUE STYLES & SCRIPTS
   ============================================================== */
function shopnow_enqueue_assets()
{

    // Styles globaux
    wp_enqueue_style('shopnow-main', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '1.0');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css');
    wp_enqueue_style('header-footer', get_template_directory_uri() . '/assets/css/header-footer.css');

    // Scripts globaux
    wp_enqueue_script('jquery'); // déjà inclus dans WP, mais on s'assure
    wp_enqueue_script('shopnow-main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('save-panier', get_template_directory_uri() . '/assets/js/savePanier.js', array(), '1.0', true);
    wp_enqueue_script('panier', get_template_directory_uri() . '/assets/js/panier.js', array(), '1.0', true);

    // Chargement conditionnel par page (slug exact)
    $page_styles_scripts = array(
        'home' => array('css/home.css', 'js/home.js'),
        'liste-produit' => array(
            'css/style-liste-produit.css',
            'js/filtre-sous-categorie.js',
            'js/pagination.js'
        ),
        'panier' => array('css/panier.css'),
        'favoris' => array('css/page-favoris.css'),
        'about-us' => array('css/about-us.css'),
        'code-validate' => array('css/forget-password.css'),
        'commande' => array('css/commandes.css', 'js/commande.js'),
        'dashboard' => array('css/dashboard.css', 'js/dashboard.js'),
        'product' => array('css/page-details-produit.css', 'js/page-details-produit.js'),
        'faq' => array('css/faq.css'),
        'forget-password' => array('css/forget-password.css'),
        'login' => array('css/reset-password.css'),
        'page-not-found' => array('css/page-not-found.css'),
        'order-history' => array('css/order-history.css'),
        'order-validate' => array('css/order-validate.css'),
        'reset-password' => array('css/reset-password.css'),
        'profile' => array('css/profile.css'),
        'signup' => array('css/reset-password.css'),
    );

    foreach ($page_styles_scripts as $slug => $files) {
        if (is_page($slug)) {
            foreach ($files as $file) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $handle = 'shopnow-' . $slug . '-' . $ext;
                $path = get_template_directory_uri() . '/assets/' . $file;

                if ($ext === 'css') {
                    wp_enqueue_style($handle, $path, array(), '1.0');
                } elseif ($ext === 'js') {
                    wp_enqueue_script($handle, $path, array(), '1.0', true);
                }
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'shopnow_enqueue_assets');


/* ==============================================================
   2. THÈME SUPPORT
   ============================================================== */
function shopnow_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'shopnow_setup');


/* ==============================================================
   3. REMPLACER LE SINGLE PRODUCT WOOCOMMERCE
   ============================================================== */
// Désactiver complètement le template WooCommerce
add_filter('woocommerce_locate_template', function ($template, $template_name) {
    if ($template_name === 'single-product.php') {
        return false; // Force WordPress à chercher dans le thème
    }
    return $template;
}, 20, 3);

// Utiliser notre template personnalisé : single-produit.php
add_filter('template_include', function ($template) {
    if (is_singular('product')) {
        $custom = locate_template('single-produit.php');
        if ($custom) {
            return $custom;
        }
    }
    return $template;
});

// Nettoyer le cache WooCommerce au changement de thème
add_action('after_switch_theme', function () {
    delete_transient('wc_template_path');
});


/* ==============================================================
   4. CRÉATION AUTOMATIQUE DES CATÉGORIES PRODUITS
   ============================================================== */
function shopnow_create_product_categories()
{
    if (get_option('shopnow_categories_created')) {
        return;
    }

    $categories = array(
        'electronique' => array(
            'Électronique',
            array(
                'smartphones-montres' => 'Smartphones & montres',
                'ordinateurs-portables' => 'Ordinateurs portables',
                'ordinateurs-gaming' => 'Ordinateurs gaming',
                'tablettes' => 'Tablettes',
                'casques-ecouteurs' => 'Casques & écouteurs',
                'televisions-home-cinema' => 'Télévisions & home cinéma',
                'appareils-photo-cameras' => 'Appareils photo & caméras',
                'accessoires' => 'Accessoires',
                'consoles-manettes' => 'Consoles & manettes',
                'composants-pc' => 'Composants PC'
            )
        ),
        'vetements' => array(
            'Vêtements',
            array(
                'tshirts-polos' => 'T-shirts & polos',
                'chemises' => 'Chemises',
                'pantalons' => 'Pantalons',
                'robes-jupes' => 'Robes & jupes',
                'vestes-manteaux' => 'Vestes & manteaux',
                'pulls-sweats' => 'Pulls & sweats',
                'chaussures' => 'Chaussures'
            )
        ),
        'electromenager' => array(
            'Électroménager',
            array(
                'refrigerateurs' => 'Réfrigérateurs',
                'machines-laver' => 'Machines à laver',
                'fours-cuisinieres' => 'Fours & cuisinières',
                'micro-ondes' => 'Micro-ondes',
                'aspirateurs' => 'Aspirateurs',
                'cafetieres' => 'Cafetières'
            )
        ),
        'meubles' => array(
            'Meubles',
            array(
                'canapes' => 'Canapés',
                'tables' => 'Tables',
                'chaises' => 'Chaises',
                'lits' => 'Lits',
                'decoration' => 'Décoration'
            )
        ),
        'bijoux' => array(
            'Bijoux',
            array(
                'bagues' => 'Bagues',
                'colliers' => 'Colliers',
                'bracelets' => 'Bracelets',
                'montres' => 'Montres'
            )
        ),
        'cosmetiques' => array(
            'Cosmétiques',
            array(
                'maquillage' => 'Maquillage',
                'soins-visage' => 'Soins du visage',
                'soins-corps' => 'Soins du corps',
                'capillaires' => 'Capillaires',
                'parfums' => 'Parfums'
            )
        ),
    );

    foreach ($categories as $slug => $data) {
        list($name, $subcats) = $data;

        // Catégorie parente
        if (!term_exists($name, 'product_cat')) {
            $parent = wp_insert_term($name, 'product_cat', array('slug' => $slug));
            $parent_id = is_wp_error($parent) ? 0 : $parent['term_id'];
        } else {
            $term = get_term_by('slug', $slug, 'product_cat');
            $parent_id = $term->term_id;
        }

        if (!$parent_id)
            continue;

        // Sous-catégories
        foreach ($subcats as $sub_slug => $sub_name) {
            if (!term_exists($sub_name, 'product_cat')) {
                wp_insert_term($sub_name, 'product_cat', array(
                    'slug' => $sub_slug,
                    'parent' => $parent_id
                ));
            }
        }
    }

    update_option('shopnow_categories_created', true);
}
add_action('after_setup_theme', 'shopnow_create_product_categories');


/* ==============================================================
   5. RÉINITIALISER LES CATÉGORIES (admin only)
   ============================================================== */
function shopnow_reset_categories()
{
    if (isset($_GET['reset_categories']) && $_GET['reset_categories'] === '1' && current_user_can('manage_options')) {
        delete_option('shopnow_categories_created');

        // Optionnel : supprimer toutes les catégories existantes
        $terms = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false));
        foreach ($terms as $term) {
            wp_delete_term($term->term_id, 'product_cat');
        }

        shopnow_create_product_categories();
        wp_redirect(admin_url('edit-tags.php?taxonomy=product_cat&post_type=product'));
        exit;
    }
}
add_action('init', 'shopnow_reset_categories');


/* ==============================================================
   6. FONCTION UTILITAIRE : assigner une catégorie à un produit
   ============================================================== */
function shopnow_assign_product_category($product_id, $main_slug, $sub_slug = '')
{
    $term_ids = array();

    $main_term = get_term_by('slug', $main_slug, 'product_cat');
    if ($main_term)
        $term_ids[] = $main_term->term_id;

    if ($sub_slug) {
        $sub_term = get_term_by('slug', $sub_slug, 'product_cat');
        if ($sub_term)
            $term_ids[] = $sub_term->term_id;
    }

    if ($term_ids) {
        wp_set_object_terms($product_id, $term_ids, 'product_cat');
    }
}

