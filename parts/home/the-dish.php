<?php 
$dish_intro_text = get_field('dish_intro_text');
$featured_post = get_field('featured_post');
if($dish_intro_text || $featured_post) { ?>
<section class="featured-dish-container">
  <?php if ($dish_intro_text) { ?>
  <div class="intro-wrapper">
    <div class="wrapper">
      <?php echo anti_email_spam($dish_intro_text); ?>
    </div>
  </div>
  <?php } ?>

  <?php if ($featured_post) { 
  $f_id = $featured_post->ID;
  $f_title = $featured_post->post_title;
  $f_content = $featured_post->post_content;
  $post_date = get_the_date('F j,Y', $f_id);
  $has_image = ( has_post_thumbnail($f_id) ) ? 'has-image':'no-image';
  ?>
  <div class="featuredPost <?php echo $has_image ?>">
    <div class="wrapper">
      <div class="flexwrap">
      <?php if ( has_post_thumbnail($f_id) ) { ?>
      <figure class="feat-image">
        <?php echo get_the_post_thumbnail($f_id); ?>
      </figure>
      <?php } ?>
      <?php if ($f_content) { ?>
      <div class="text">
        <div class="inside">
          <h3><?php echo $f_title; ?></h3>
          <div class="post-date"><?php echo $post_date ?></div>
          <?php echo shortenText( strip_tags($f_content), 200, ' ','...' ); ?>

          <div class="read-more">
            <a href="<?php echo get_permalink($f_id); ?>" class="button">Read More</a>
          </div>
        </div>
      </div>
      <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>
</section>
<?php } ?>