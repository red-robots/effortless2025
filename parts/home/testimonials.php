<?php 
$home_page_id = get_option('page_on_front');
$testimonial_intro_text = get_field('testimonial_intro_text', $home_page_id);
$testimonial_selections = get_field('testimonial_selections', $home_page_id);
//$display = get_field('testimonials_displaynum', $home_page_id);
// $maxItems = ($display) ? $display : 6;
// $args = array(
//   'posts_per_page'=> $maxItems,
//   'post_type'     => 'testimonial',
//   'post_status'   => 'publish',
// );
//$testimonials = new WP_Query($args);
if ( $testimonial_selections ) { ?>
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
        <?php foreach($testimonial_selections as $ts) { 
          $raw_content = $ts->post_content;
          $content = ($raw_content) ? apply_filters('the_content', $raw_content) : '';
          ?>
          <?php if ( $raw_content ) { ?>
          <div class="swiper-slide">
            <div class="testimonial">
              <div class="is-active">
                <?php echo $content; ?>
              </div>
              <div class="not-active">
                <?php echo shortenText( strip_tags($raw_content), 150, ' ','...' ) ?>
              </div>
              <div class="author"><?php echo $ts->post_title; ?></div>
            </div>
          </div>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>
<?php } ?>

