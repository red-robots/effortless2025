<?php if( get_row_layout() == 'two_column_intro' ) {
  $image_type = get_sub_field('featured_image_type');
  $description = get_sub_field('description');
  $featured_image = get_sub_field('featured_image');
  $collages = get_sub_field('collage_images');
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
        <div class="imageBlock imageBlock-single">
          <figure>
            <img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['title'] ?>" />
          </figure>
        </div>
        <?php } ?>

        <?php if($image_type=='collage' && $collages) { 
          $countImages = count($collages);
          $columnClass = ( $countImages > 1 ) ? 'two-column':'one-column';
          if($countImages > 4) {
            $columnClass .= ' morethan5';
          }
          $chunks = array();
          if($countImages>2) {
            $chunks = array_chunk($collages,2);
            // echo "<pre>";
            // print_r($chunks);
            // echo "</pre>";
          }
        ?>
        <div class="imageBlock imageBlock-collage collage">
          <div class="collage-images count-<?php echo $countImages;?> <?php echo $columnClass;?>">
            <?php if($chunks) { ?>

              <?php $c=1; foreach ($chunks as $items) { ?>
              <div class="imageRow">
                <?php $i=1; foreach ($items as $img) { 
                  $oddEven = ($i % 2==0) ? 'even':'odd';
                  ?>
                  <div class="image <?php echo $oddEven ?>">
                    <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>" />
                  </div>
                <?php $i++; } ?>
              </div>
              <?php $c++; } ?>

            <?php } else { ?>

              <?php if ($collages) { ?>
                <?php $i=1; foreach ($collages as $img) { 
                  $oddEven = ($i % 2==0) ? 'even':'odd';
                  $oddEven .= ($i==$countImages) ? ' last':'';
                  ?>
                  <div class="image <?php echo $oddEven ?>">
                    <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>" />
                  </div>
                <?php $i++; } ?>
              <?php } ?>

            <?php } ?>
          </div>
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