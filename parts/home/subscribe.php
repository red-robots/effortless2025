<?php
$subscribe_image = get_field('subscribe_featured_image');
$subscribe_text = get_field('subscribe_text');
$subscribe_class = ($subscribe_image && $subscribe_text) ? 'half' : 'full';
if( $subscribe_text ) { ?>
<section class="subscribe-container <?php echo $subscribe_class ?>">
  <div class="wrapper">
    <div class="flexwrap">
      <?php if ($subscribe_image) { ?>
      <figure class="imageBlock">
        <img src="<?php echo $subscribe_image['url'] ?>" alt="">
      </figure>
      <?php } ?>
      <?php if ($subscribe_text) { ?>
      <div class="textBlock">
        <div class="text"><?php echo anti_email_spam($subscribe_text); ?></div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>