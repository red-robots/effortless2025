<?php if( get_row_layout() == 'slider_section' ) {
  $add_intro = get_sub_field('add_intro');
  $intro_text = ($add_intro) ? get_sub_field('section_intro') : '';
  $sliderImages = get_sub_field('slide_images');
  $section_column = get_sub_field('section_column');
  $text_alignment = get_sub_field('text_alignment');
  if($text_alignment) {
    $section_column .= ' text-align-' . $text_alignment;
  }
  if( $sliderImages ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="wrapper">
      <div class="flexwrap <?php echo $section_column ?>">
        <?php if ($intro_text) { ?>
        <div class="textCol">
          <div class="text"><?php echo anti_email_spam($intro_text); ?></div>
        </div>
        <?php } ?>

        <?php if ($sliderImages) { ?>
        <div class="sliderCol">
          <div class="swiper-container section-slideshow">
            <div class="swiper-wrapper">
              <?php foreach ($sliderImages as $img) { ?>
                <div class="swiper-slide">
                  <div class="slideImage" style="background-image:url('<?php echo $img['url'] ?>')"></div>
                </div>
              <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>