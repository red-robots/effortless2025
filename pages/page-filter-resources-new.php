<?php
/**
 * Template Name: Sources & Resources (NEW)
 *
 */
get_header(); 
$filter_term_id = ( isset($_GET['termid']) && $_GET['termid'] ) ? $_GET['termid'] : '';
$filter_by_search = ( isset($_GET['q']) && $_GET['q'] ) ? $_GET['q'] : '';
$is_filtered = ($filter_term_id) ? true : false;
$current_term_name = ($filter_term_id && get_term($filter_term_id)) ? get_term( $filter_term_id )->name : '';
$has_filtering = ($filter_term_id || $filter_by_search) ? true : false;
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if( have_posts() ) :  the_post();
			get_template_part( 'template-parts/content', 'filter-sources-resources' );
	    endif; // End of the loop.
		?>
    <?php  
    $taxonomy = 'sources-resources-category';
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
          $pageLink = get_permalink() . '?termid=' . $termID . '#main';
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
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
