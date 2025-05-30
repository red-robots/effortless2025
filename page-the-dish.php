<?php
/**
 * Template Name: The Dish
 */
get_header(); 
$filter_term_id = ( isset($_GET['termid']) && $_GET['termid'] ) ? $_GET['termid'] : '';
$filter_by_search = ( isset($_GET['q']) && $_GET['q'] ) ? $_GET['q'] : '';
$is_filtered = ($filter_term_id) ? true : false;
$current_term_name = ($filter_term_id && get_term($filter_term_id)) ? get_term( $filter_term_id )->name : '';
$has_filtering = ($filter_term_id || $filter_by_search) ? true : false;
?>

<main id="main" class="site-main the-dish-content" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <?php endwhile; ?>
  
  <?php  
  $blog_heading = get_field('blog_heading');
  $custom_heading = ($blog_heading) ? $blog_heading : '';
  if($current_term_name) {
    $custom_heading = $current_term_name;
  }
  ?>
  <?php if ($has_filtering) { ?>
  <div class="breadcrumb breadcrumb-dish">
    <div class="wrapper">
      <a href="<?php echo get_permalink() ?>#main" class="goback">&larr; View All</a>
    </div>
  </div> 
  <?php } ?>
  <div class="titleSection">
    <div class="wrapper">
      <div class="flexwrap">
        <?php if ($custom_heading) { ?>
        <div class="titleDiv">
          <h2><?php echo $custom_heading ?></h2>
        </div> 
        <?php } ?>  
        <div class="searchBlock">
          <form action="<?php echo get_permalink() ?>">
            <div class="input-field">
              <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
              <div class="input">
                <input type="text" name="q" class="searchInput" placeholder="Search Blog" value="<?php echo $filter_by_search ?>" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  $taxonomy = 'category';
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
    <div class="wrapper">
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

  <?php  
  //$perpage = ($has_filtering) ? 10 : 2;
  $perpage = 10;
  $paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
  $args = array(
    'posts_per_page'   => $perpage,
    'paged'            => $paged,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish'
  );
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
  if($filter_by_search) {
    $args['paged'] = $paged;
    $args['s'] = $filter_by_search;
    $args['search_columns'] = array( 'post_content', 'post_name', 'post_title' ); 
  }
  $news = new WP_Query($args);
  if ( $news->have_posts() ) { ?>
  <section id="entries" class="recentPostsContainer<?php echo $is_filtered_class ?>">
    <div class="wrapper">
      <div class="flexwrap">
        <?php while ( $news->have_posts() ) : $news->the_post(); 
        $content = get_the_content(); 
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $featuredImg = wp_get_attachment_image_src($post_thumbnail_id,'full');
        //print_r($featuredImg);
        ?>
        <article id="post--<?php echo $post_id ?>" class="post">
          <div class="inner">
            <?php if ( get_the_post_thumbnail() ) { ?>
            <div class="imageCol">
              <figure><?php the_post_thumbnail(); ?></figure>
            </div>  
            <?php } ?>
            <div class="textCol">
              <div class="wrap">
                <div class="post-date"><?php echo get_the_date('m.d.Y') ?></div>
                <h3 class="post-title"><?php the_title(); ?></h3>
                <?php if ($content) { 
                  $s_content = trim($content);
                  $s_content = strip_shortcodes($s_content);
                  $s_content = strip_tags($s_content); 
                  $s_content = preg_replace('~\x{00a0}~siu',' ',$s_content);
                  ?>
                  <div class="post-excerpt"><?php echo shortenText($s_content, 450,' ','...'); ?></div>
                  <div class="more-link"><a href="<?php echo get_permalink()?>">Read More <span>&gt;</span></a></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <?php
  //if($filter_term_id) {
    $total_pages = $news->max_num_pages;
    if ($total_pages > 1){ ?>
    <div id="pagination" class="pagination-wrapper pagination-dish">
      <div class="wrapper">
      <?php 
      $pagination = array(
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
    <?php }  
    //} ?>
  <?php } ?>

</main>

<?php
get_footer();