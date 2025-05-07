<?php
/**
 * Template Name: Flexible Content
 */
get_header(); 
?>

<main id="main" class="site-main" role="main">

  <?php while ( have_posts() ) : the_post(); ?>
  <?php endwhile; ?>

	<?php if( have_rows('flexible_content') ) {  ?>
  <div class="flexible-content-wrapper">
    <?php 
    $dir = get_template_directory() . "/parts/flexible/";
    $files = scandir($dir,1);
    $templates = [];
    //echo "<pre>";
    if($files) {
      foreach($files as $file) {
        if ( (strpos($file, 'bak') !== false) || (strpos($file, 'copy') !== false) ) {
          //Skip....
        } else {
          if (strpos($file, '.php') !== false) {
            $templates[] = $file;
          }
        }
      }
    }
    //print_r($templates);
    // echo "</pre>";

    $ctr=1; while( have_rows('flexible_content') ): the_row();  
      if($templates) {
        foreach($templates as $temp) {
          include( locate_template('parts/flexible/'.$temp) ); 
        }
      }
    $ctr++; endwhile; ?>
  </div>
  <?php } ?>


  <?php get_template_part('parts/home/testimonials'); ?>
  <?php get_template_part('parts/home/subscribe'); ?>
</main>

<?php
get_footer();