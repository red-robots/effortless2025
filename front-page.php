<?php get_header(); ?>
<main id="main" class="site-main" role="main">
  <?php  
  $sections = array(
    'welcome'           => 'Welcome',
    'featured-articles' => 'Featured Articles',
    'testimonials'      => 'Testimonials',
    'subscribe'         => 'Subscribe',
    'the-dish'          => 'The Dish',
    'featured-dishes'   => 'Featured Dish (3)',
    'favorites'         => 'Favorites'
  );

  $orders = get_field('home_section_order');
  $layouts = array();

  if($orders) {
    foreach($orders as $e) {
      if( $section_name = trim($e['name']) ) {
        foreach($sections as $k=>$v) {
          if($v==$section_name) {
            $layouts[$k] = $v;
          }
        }
      }
    }
  }

  ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php 
      $content = array();
      foreach($sections as $sId => $sName) {
        ob_start(); 
        get_template_part('parts/home/' . $sId);
        $content[$sId] = ob_get_contents();
        ob_get_clean();
      }

      if($layouts) {
        get_template_part('parts/home/intro'); 
        foreach($layouts as $slug=>$name) {
          if( isset($content[$slug]) && $content[$slug] ) {
            echo $content[$slug];
          }
        }
      } else {
        get_template_part('parts/home/intro'); 
        get_template_part('parts/home/welcome');
        get_template_part('parts/home/featured-articles');
        get_template_part('parts/home/testimonials');
        get_template_part('parts/home/subscribe');
        get_template_part('parts/home/the-dish');
        get_template_part('parts/home/featured-dishes');
        get_template_part('parts/home/favorites');
      }
    ?>
  

  <?php endwhile; ?>
</main>

<?php
get_footer();
