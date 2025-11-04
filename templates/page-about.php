<?php
/**
 * Template Name: About Page
 */

get_header(); ?>

<div class="about-page">
    <h1><?php the_title(); ?></h1>
    <div class="about-content">
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </div>
</div>

<?php get_footer(); ?>