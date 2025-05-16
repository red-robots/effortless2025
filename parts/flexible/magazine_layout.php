<?php if( get_row_layout() == 'magazine_layout' ) {
  $add_intro = get_sub_field('add_magazine_intro');
  $numcol = get_sub_field('columns_per_row');
  $perRow = ($numcol) ? $numcol : 4;
  $items = get_sub_field('items');
  $intro_text = '';
  if($add_intro) {
    $intro_text = get_sub_field('section_intro');
  }
  $gallery = get_sub_field('magazine_gallery');
  if( $gallery ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <?php if ($intro_text) { ?>
    <div class="intro-wrapper">
      <div class="wrapper">
        <?php echo anti_email_spam($intro_text); ?>
      </div>
    </div>
    <?php } ?>

    <div class="magazineBlocks perrow<?php echo $perRow ?>">
      <div class="wrapper">
        <div class="flexbox">
          <?php foreach ($gallery as $img) { 
            $imageID = $img['ID'];
            $title = $img['title'];
            $caption = $img['caption'];
            $imgUrl = $img['url'];
            $clickthroughUrl = get_field('clickthroughUrl', $imageID);
            $clickthroughTarget = get_field('clickthroughUrl', $imageID);
            $linkTarget = '';
            if($clickthroughUrl) {
              $linkTarget = ($clickthroughTarget) ? '_blank':'_self';
            }
            ?>
            <div class="magazine">
              <figure>
                <?php if ($clickthroughUrl) { ?>
                  <a href="<?php echo $clickthroughUrl ?>" class="image-wrap image-link" target="<?php echo $linkTarget ?>">
                    <span class="image">
                      <img src="<?php echo $imgUrl ?>" alt="<?php echo $title ?>">
                    </span>
                    <?php if ($title || $caption) { ?>
                    <figcaption>
                      <?php if ($title) { ?>
                      <div class="imageTitle"><?php echo $title ?></div>
                      <?php } ?>
                      <?php if ($caption) { ?>
                      <div class="imageText"><?php echo $caption ?></div>
                      <?php } ?>
                    </figcaption>
                    <?php } ?>
                  </a>  
                <?php } else { ?>
                <span class="image-wrap">
                  <span class="image">
                    <img src="<?php echo $imgUrl ?>" alt="<?php echo $title ?>">
                  </span>
                  <?php if ($title || $caption) { ?>
                  <figcaption>
                    <?php if ($title) { ?>
                    <div class="imageTitle"><?php echo $title ?></div>
                    <?php } ?>
                    <?php if ($caption) { ?>
                    <div class="imageText"><?php echo $caption ?></div>
                    <?php } ?>
                  </figcaption>
                  <?php } ?>
                </span>
                <?php } ?>
              </figure>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>