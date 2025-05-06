<?php 
$testimonial_intro_text = get_field('testimonial_intro_text');
$display = get_field('testimonials_displaynum');
$maxItems = ($display) ? $display : 6;
$args = array(
  'posts_per_page'=> $maxItems,
  'post_type'     => 'testimonial',
  'post_status'   => 'publish',
);

$testimonials = new WP_Query($args);
if ( $testimonials->have_posts() ) { ?>
<section class="testimonial-carousel">
  <div class="inner-wrapper">
    <?php if ($testimonial_intro_text) { ?>
    <div class="intro-wrapper">
      <div class="wrapper">
        <?php echo anti_email_spam($testimonial_intro_text); ?>
      </div> 
    </div>
    <?php } ?>
    <div class="swiper testimonialSwiper">
      <div class="swiper-wrapper">
        <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
          <?php if ( get_the_content() ) { ?>
          <div class="swiper-slide">
            <div class="testimonial">
              <div class="is-active">
                <?php the_content(); ?>
              </div>
              <div class="not-active">
                <?php echo shortenText( strip_tags(get_the_content()), 150, ' ','...' ) ?>
              </div>
              <div class="author"><?php echo get_the_title(); ?></div>
            </div>
          </div>
          <?php } ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>
<?php } ?>

