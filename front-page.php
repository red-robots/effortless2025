<?php get_header(); ?>
<main id="main" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php get_template_part('parts/home/intro'); ?>
    <?php get_template_part('parts/home/welcome'); ?>
    <?php get_template_part('parts/home/featured-articles'); ?>
    <?php get_template_part('parts/home/testimonials'); ?>
    <?php get_template_part('parts/home/subscribe'); ?>
    <?php get_template_part('parts/home/the-dish'); ?>
    <?php get_template_part('parts/home/featured-dishes'); ?>
    <?php get_template_part('parts/home/favorites'); ?>

  <?php endwhile; ?>
</main>

<?php
get_footer();
