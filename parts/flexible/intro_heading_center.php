<?php if( get_row_layout() == 'intro_heading_center' ) {
  $intro_text = get_sub_field('intro_text_content');
  if( $intro_text ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="introText">
      <div class="wrapper">
        <?php echo anti_email_spam($intro_text); ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>