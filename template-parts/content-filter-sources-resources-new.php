<?php
/**
 * Template part for displaying page content in page-filter-menus-recipes.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */


$post_type = array('sources-resources');
$perpage = 20;
$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
$args = array(
  'posts_per_page'   => $perpage,
  'paged'            => $paged,
  'post_type'        => $post_type,
  'post_status'      => 'publish'
);
if($filter_by_search) {
  $args['paged'] = $paged;
  $args['s'] = $filter_by_search;
  $args['search_columns'] = array( 'post_content', 'post_name', 'post_title' ); 
  $args['meta_query'] = array(
    'relation' => 'OR',
    array(
      'key' => 'product_title',
      'value' => $filter_by_search,
      'compare' => 'LIKE'
    ),
    array(
      'key' => 'company',
      'value' => $filter_by_search,
      'compare' => 'LIKE'
    ),
  );
}
if($filter_term_id) {
  // $args['paged'] = $paged;
  $args['tax_query'] = array(
    array(
      'taxonomy' => $taxonomy,
      'field' => 'term_id',
      'terms' => $filter_term_id
    )
  );
}
$entries = new WP_Query($args); 
$total_found = ( $entries->have_posts() ) ? $entries->found_posts : 0;
$found_text = '';
if($total_found==0) {
  $found_text = 'no item found';
}
else if($total_found==1) {
  $found_text = $total_found . ' item';
}
else if($total_found>1) {
  $found_text = $total_found . ' items';
}
?>

<?php if ($has_filtering) { ?>
<div class="breadcrumb-container">
  <a href="<?php echo get_permalink(); ?>" class="view-all">All <?php echo get_the_title() ?></a> 
  <?php if ($filter_term_id) { 
    //$current_term = get_term($filter_term_id, $taxonomy);
    $termLink = get_permalink() . '?termid=' . $filter_term_id;
    ?>
    <span>/</span>
    <span><?php echo $current_term_name ?></span>
  <?php } ?>

  <?php if ($filter_by_search) {  ?>
    <span>|</span>
    <span class="found">Search Result: <?php echo $found_text ?></span>
  <?php } ?>
</div>
<?php } ?>

<?php if ( $entries->have_posts() ) {  ?>
<section id="products-container" class="product-list-container">
  <div class="container">
    <?php while ( $entries->have_posts() ) : $entries->the_post(); 
      $website_link = get_field("website_link");
      $pdf_link = get_field("pdf_link");
      $image = get_field("search_image");
      $company = get_field("company");
      $product_title = get_field("product_title");
      if( $pdf_link || $website_link ) { ?>
      <div class="item">
        <?php if ($pdf_link) { ?>
        <a href="<?php echo $pdf_link['url'] ?>" target="_blank">
        <?php } else { ?>
        <a href="<?php echo $website_link ?>" target="_blank">
        <?php } ?>
          <?php if ($image) { ?>
          <figure><img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>"></figure>
          <?php } ?>
          <?php if($product_title||$company) { ?>
          <figcaption>
            <?php if($company):?>
              <h3><?php echo $company;?></h3>  
            <?php endif;
            if($product_title):?>
              <h4><?php echo $product_title;?></h4>
            <?php endif;?>
          </figcaption>
          <?php } ?>
        </a>
      </div>
      <?php } ?>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>

  <?php
  $total_pages = $entries->max_num_pages;
  if ($total_pages > 1){ ?>
  <div id="pagination" class="pagination-wrapper">
    <div class="wrapper">
      <?php $pagination = array(
        'base' => @add_query_arg('pg','%#%'),
        'format' => '?pg=%#%',
        'mid-size' => 1,
        'current' => $paged,
        'total' => $total_pages,
        'prev_next' => True,
        'prev_text' => __( '<i class="fa-solid fa-arrow-left"></i>' ),
        'next_text' => __( '<i class="fa-solid fa-arrow-right"></i>' )
      );
      echo paginate_links($pagination); ?>
    </div>
  </div>
  <?php } ?>
</section>
<?php } ?>