<?php if( get_row_layout() == 'testimonials' ) {
  $selectedTestimonialsIntro = get_sub_field('text');
  $selectedTestimonials = get_sub_field('select_testimonial');
  $has_content =  false;
  if($selectedTestimonialsIntro || $selectedTestimonials) {
    $has_content =  true;
  }

  if( $has_content ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="testimonial-carousel testimonial-carousel-repeater">
      <?php if ($selectedTestimonialsIntro) { ?>
      <div class="intro-wrapper">
        <div class="textCol"><div class="text"><?php echo anti_email_spam($selectedTestimonialsIntro); ?></div></div>  
      </div>
      <?php } ?>

      <?php if ($selectedTestimonials) { ?>
      <div class="swiper testimonialSwiper">
        <div class="swiper-wrapper">
          <?php foreach($selectedTestimonials as $stest) { 
            $testimonialText = $stest->post_content;
            $testimonialContent = ($testimonialText) ? apply_filters('the_content', $testimonialText) : '';
            ?>
            <?php if ( $testimonialText ) { ?>
            <div class="swiper-slide">
              <div class="testimonial">
                <div class="is-active">
                  <?php echo anti_email_spam($testimonialContent); ?>
                </div>
                <div class="not-active">
                  <?php echo shortenText( strip_tags($testimonialText), 150, ' ','...' ) ?>
                </div>
                <div class="author"><?php echo $stest->post_title; ?></div>
              </div>
            </div>
            <?php } ?>
          <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
      <?php } ?>
    </div>
  </section>
  <?php } ?>
<?php } ?>