<?php
// functions.php

// Enqueue styles and scripts
function my_theme_enqueue_assets()
{
    // Enqueue main stylesheets
    wp_enqueue_style('my-theme-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('theme-fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css');
    wp_enqueue_style('theme-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array(), null);
    // Enqueue fichiers javascript
    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
    wp_enqueue_script('theme-savepanier', get_template_directory_uri() . '/assets/js/savePanier.js', array(), null, true);


    //page home
    if (is_page('home')) {
        wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css', array());
    } elseif (is_page('liste-produit')) {
        wp_enqueue_style('liste-produit-css', get_template_directory_uri() . '/assets/css/style-liste-produit.css', array());
    } elseif (is_page('panier')) {
        wp_enqueue_style('panier-css', get_template_directory_uri() . '/assets/css/panier.css', array());
    } elseif (is_page('favoris')) {
        wp_enqueue_style('favoris-css', get_template_directory_uri() . '/assets/css/page-favoris.css', array());
    } elseif (is_page('about-us')) {
        wp_enqueue_style('about-us-css', get_template_directory_uri() . '/assets/css/about-us.css', array());
    } elseif (is_page('code-validate')) {
        wp_enqueue_style('code-validate-css', get_template_directory_uri() . '/assets/css/forget-password.css', array());
    } elseif (is_page('commande')) {
        wp_enqueue_style('commande-css', get_template_directory_uri() . '/assets/css/commandes.css', array());
    } elseif (is_page('dashboard')) {
        wp_enqueue_style('dashboard-css', get_template_directory_uri() . '/assets/css/dashboard.css', array());
    } elseif (is_page('details-produit')) {
        wp_enqueue_style('details-produit-css', get_template_directory_uri() . '/assets/css/page-details-produit.css', array());
    } elseif (is_page('faq')) {
        wp_enqueue_style('faq-css', get_template_directory_uri() . '/assets/css/faq.css', array());
    } elseif (is_page('forget-password')) {
        wp_enqueue_style('forget-password-css', get_template_directory_uri() . '/assets/css/forget-password.css', array());
    } elseif (is_page('login')) {
        wp_enqueue_style('login-css', get_template_directory_uri() . '/assets/css/login-signup.css', array());
    } elseif (is_page('page-not-found')) {
        wp_enqueue_style('page-not-found-css', get_template_directory_uri() . '/assets/css/page-not-found.css', array());
    } elseif (is_page('order-history')) {
        wp_enqueue_style('order-history-css', get_template_directory_uri() . '/assets/css/order-history.css', array());
    } elseif (is_page('order-validate')) {
        wp_enqueue_style('order-validate-css', get_template_directory_uri() . '/assets/css/order-validate.css', array());
    } elseif (is_page('reset-password')) {
        wp_enqueue_style('reset-password-css', get_template_directory_uri() . '/assets/css/reset-password.css', array());
    } elseif (is_page('setting')) {
        wp_enqueue_style('setting-css', get_template_directory_uri() . '/assets/css/settings.css', array());
    } elseif (is_page('signup')) {
        wp_enqueue_style('signup-css', get_template_directory_uri() . '/assets/css/login-signup.css', array());
    }

}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');



// Add theme support
function my_theme_setup()
{
    // Add support for featured images
    add_theme_support('post-thumbnails');

    // Add support for title tag
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_theme_setup');



?>