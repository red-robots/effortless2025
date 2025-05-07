<?php if( get_row_layout() == 'two_column_intro' ) {
  $image_type = get_sub_field('featured_image_type');
  $description = get_sub_field('description');
  $featured_image = get_sub_field('featured_image');
  $has_content =  false;
  if($image_type=='single' && $featured_image) {
    $has_content =  true;
  }
  if( $description ) {
    $has_content =  true;
  }

  if( $has_content ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="wrapper">
      <div class="flexwrap">
        <?php if($image_type=='single' && $featured_image) { ?>
        <div class="imageBlock">
          <figure>
            <img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['title'] ?>" />
          </figure>
        </div>
        <?php } ?>
        <?php if( $description ) { ?>
        <div class="textBlock">
          <div class="text"><?php echo anti_email_spam($description); ?></div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>