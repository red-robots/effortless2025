<?php if( get_row_layout() == 'image_and_text_column' ) {
  $featured_image = get_sub_field('featured_image');
  $description = get_sub_field('text');
  $image_position = get_sub_field('image_position');
  $buttons_alignment = get_sub_field('buttons_alignment');
  $bgcolor = get_sub_field('bgcolor');
  $text_color = get_sub_field('text_color');
  $addonClass = '';
  if($image_position) {
    $addonClass .= ' image-position-'.$image_position;
  }
  if($buttons_alignment) {
    $addonClass .= ' buttons-align-'.$buttons_alignment;
  }
  if( $featured_image ||  $description ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?><?php echo $addonClass ?>">
    <div class="wrapper">
      <div class="flexwrap">
        <?php if ($description) { ?>
        <div class="textCol"><div class="text"><?php echo anti_email_spam($description); ?></div></div>  
        <?php } ?>
        <?php if ($featured_image) { ?>
        <div class="imageCol">
          <figure>
            <img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['title'] ?>" />
          </figure>
        </div>  
        <?php } ?>
      </div>
    </div>

    <style>
      .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>,
      .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> p, 
      .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> li,
      .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> table {
        color: <?php echo $text_color ?>;
      }
      .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> .flexwrap {
        background-color: <?php echo $bgcolor ?>;
      }
    </style>
  </section>
  <?php } ?>
<?php } ?>