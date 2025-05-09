<?php if( get_row_layout() == 'fullwidth_textcontent' ) {
  $intro_text = get_sub_field('intro_text_content');
  $content_alignment = get_sub_field('content_alignment');
  $has_graphic_background = get_sub_field('has_graphic_background');
  $addon_class = $content_alignment;
  if($has_graphic_background) {
    $addon_class .= ' has-graphic-background';
  }

  if( $intro_text ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> <?php echo $addon_class ?>">
    <div class="intro-wrapper">
      <div class="wrapper">
        <?php echo anti_email_spam($intro_text); ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>