<?php
/**
 * Template Name: Sources & Resources (NEW)
 *
 */
get_header();
global $post_type;
global $tax;
global $from_tax;
global $taxonomy;
$taxonomy = 'sources-resources-category';
$from_tax = 'from-2';
$tax = 'sub-2';
$post_type = array('sources-resources');
$queried_object = get_queried_object();
$filter_term_id = ( isset($_GET['termid']) && $_GET['termid'] ) ? $_GET['termid'] : '';
//$keyword = ( isset($_GET['search']) && $_GET['search'] ) ? $_GET['search'] : '';
$filter_by_search = ( isset($_GET['search']) && $_GET['search'] ) ? $_GET['search'] : '';
$is_filtered = ($filter_term_id) ? true : false;
$current_term_name = ($filter_term_id && get_term($filter_term_id)) ? get_term( $filter_term_id )->name : '';
$has_filtering = ($filter_term_id || $filter_by_search) ? true : false;

?>

<div id="primary" class="content-area content-sources-resources">
	<main id="main" class="site-main" role="main">
		<div class="shop-entry-header">
      <?php if ($current_term_name) { ?>
      <div class="titleCol">
        <h1><?php echo $current_term_name ?></h1>
      </div>
      <?php } ?>
      <div class="searchCol">
        <div class="searchBlock">
          <?php get_template_part('template-parts/content', 'search-form-new');?>
        </div>
      </div>
    </div>

    <?php  
    $terms = get_terms([
      'taxonomy'    => $taxonomy,
      'hide_empty'  => true,
      'exclude'     => 1
    ]);
    $countTerms = ($terms) ? count($terms) : 0;
    $is_filtered_class = ($has_filtering) ? ' is-filtered':'';
    if($has_filtering) {
      $terms = false;
    }
    if($terms) { ?>
    <section class="categoryContainer<?php echo $is_filtered_class ?>" data-count="<?php echo $countTerms ?>">
      <div class="wrapper-inner">
        <div class="flexwrap">
        <?php foreach ($terms as $term) { 
          $image = get_field('category_image', $term);
          $termID = $term->term_id;
          $pageLink = get_permalink() . '?termid=' . $termID;
          $current_term = ($filter_term_id && ($termID==$filter_term_id)) ? ' current':'';
          ?>
          <div data-termid="<?php echo $termID ?>" class="imageBlock<?php echo $current_term ?>">
            <figure>
              <a href="<?php echo $pageLink ?>" class="termLink">
                <div class="imagewrap">
                <?php if ($image) { ?>
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" />
                <?php } ?>
                </div>
                <figcaption>
                  <span><?php echo $term->name ?></span>
                </figcaption>
              </a>
            </figure>
          </div>
        <?php } ?>
        </div>
      </div>
    </section>
    <?php } ?>


    <?php 
    // if( have_posts() ) :  the_post();
    // get_template_part( 'template-parts/content', 'filter-sources-resources-new' );
    // endif;  
    //get_template_part( 'template-parts/content', 'filter-sources-resources-new' );
    include( locate_template('template-parts/content-filter-sources-resources-new.php') ); 
    ?>
	</main><!-- #main -->
</div><!-- #primary -->

<script>
jQuery(document).ready(function($){
  if( (typeof params.pg!=='undefined' || params.pg!=null) || typeof params.termid!=='undefined' || params.termid!=null ) {
    doSmoothScroll('#products-container');
    setTimeout(function(){
      doSmoothScroll('#products-container');
    },200);
  }
  

  function doSmoothScroll(target) {
    var target = $(target);
    var topOffset = $('#masthead').outerHeight() + 100;
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - topOffset
      }, 800, function() {
        target.focus();
        if (target.is(":focus")) { 
          return false;
        } else {
          target.attr('tabindex','-1'); 
          target.focus(); 
          target.css('outline','0');
        };
      });
    }
  }
});
</script>
<?php
get_footer();
