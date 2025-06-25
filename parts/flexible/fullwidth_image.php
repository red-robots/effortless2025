<?php if( get_row_layout() == 'fullwidth_image' ) {
  $image = get_sub_field('image');
  if( $image ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="wrapper">
      <figure>
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" />
      </figure>
    </div>
  </section>
  <?php } ?>
<?php } ?>

