<?php
// functions.php

// Enqueue styles and scripts
function my_theme_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('my-theme-style', get_stylesheet_directory_uri() . '/assets/css/style.css');

    // Enqueue JavaScript file
    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);

    wp_enqueue_style('theme-fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css');
  wp_enqueue_style('theme-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array(), null);

  wp_enqueue_style('theme-home', get_template_directory_uri() . '/assets/css/home.css', array(), null);

  wp_enqueue_script('theme-savepanier', get_template_directory_uri() . '/assets/js/savePanier.js', array(), null, true);
  wp_enqueue_script('theme-home', get_template_directory_uri() . '/js/home.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// Register menus
function my_theme_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-theme'),
        'footer' => __('Footer Menu', 'my-theme'),
    ));
}
add_action('init', 'my_theme_register_menus');

// Add theme support
function my_theme_setup() {
    // Add support for featured images
    add_theme_support('post-thumbnails');

    // Add support for title tag
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_theme_setup');

function theme_ecommerce_enqueue_assets() {
  
  
}

?>