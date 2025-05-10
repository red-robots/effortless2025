<?php if( get_row_layout() == 'grid_layout' ) {
  $add_intro = get_sub_field('add_intro');
  $numcol = get_sub_field('columns_per_row');
  $perRow = ($numcol) ? $numcol : 3;
  $items = get_sub_field('items');
  $intro_text = '';
  if($add_intro) {
    $intro_text = get_sub_field('section_intro');
  }
  $items = get_sub_field('items');
  if( $items ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <?php if ($intro_text) { ?>
    <div class="intro-wrapper">
      <div class="wrapper">
        <?php echo anti_email_spam($intro_text); ?>
      </div>
    </div>
    <?php } ?>

    <?php if ($items) { ?>
    <div class="featuredArticles grid-posts numcol-<?php echo $numcol ?>">
      <div class="wrapper">
        <div class="flexwrap">
          <?php foreach ($items as $a) { 
            $image = $a['image'];
            $text = $a['column_description'];
            $btn = $a['button'];
            $btnLink = (isset($btn['url'])) ? $btn['url'] : '';
            $btnName = (isset($btn['title'])) ? $btn['title'] : '';
            $btnTarget = (isset($btn['target'])) ? $btn['target'] : '';
            $hasImage = ($image) ? 'has-image':'no-image';
          ?>
          <div class="infobox">
            <div class="innerpad">
              <figure class="<?php echo $hasImage ?>">
                <?php if ($image) { ?>
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                <?php } ?>
              </figure>

              <div class="details">
                <?php if ($text) { ?>
                  <div class="text"><?php echo anti_email_spam($text); ?></div>
                <?php } ?>
                <?php if ($btnLink && $btnName) { ?>
                  <div class="button-wrap">
                    <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button"><?php echo $btnName ?></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </section>
  <?php } ?>
<?php } ?>