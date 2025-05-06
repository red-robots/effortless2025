<?php 
$featured_dish_intro_text = get_field('featured_dish_intro_text');
$featured_dish_posts = get_field('featured_dish_posts');
if($featured_dish_intro_text || $featured_dish_posts) { ?>
<section class="featured-dishes-posts featured-articles-column">
  <?php if ($featured_dish_intro_text) { ?>
  <div class="intro-wrapper">
    <div class="wrapper">
      <?php echo anti_email_spam($featured_dish_intro_text); ?>
    </div>
  </div>
  <?php } ?>

  <?php if ($featured_dish_posts) { ?>
  <div class="featured-posts-column">
    <div class="wrapper">
      <div class="entries">
        <?php foreach ($featured_dish_posts as $fp) { 
          $f_id = $fp->ID;
          $f_title = $fp->post_title;
          $f_content = $fp->post_content;
          $post_date = get_the_date('F j,Y', $f_id);
          $has_image = ( has_post_thumbnail($f_id) ) ? 'has-image':'no-image';
        ?>
        <article class="hentry">
          <div class="inside">
            <a href="<?php echo get_permalink($f_id); ?>" class="postLink">
              <?php if ( has_post_thumbnail($f_id) ) { ?>
              <figure class="feat-image">
                <?php echo get_the_post_thumbnail($f_id); ?>
              </figure>
              <?php } ?>

              <div class="details">
                <span class="h3"><?php echo $f_title; ?></span>
                <small class="date"><?php echo $post_date ?></small>
              </div>
            </a>
          </div>
        </article>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>
</section>
<?php } ?>