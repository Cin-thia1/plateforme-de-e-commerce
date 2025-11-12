<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */
<?php
/**
 * Single Product template override.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); // Utilise ton header custom

// Charge ta page custom ici
include get_template_directory() . '/page-details-produit.php';

get_footer(); // Utilise ton footer custom
?>

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
