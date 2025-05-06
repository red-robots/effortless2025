<?php 
$favorites_intro_text = get_field('favorites_intro_text');
$favorite_topics = get_field('favorite_topics');
if($favorites_intro_text || $favorite_topics) { ?>
<section class="featured-dish-container">
  <?php if ($favorites_intro_text) { ?>
  <div class="intro-wrapper">
    <div class="wrapper">
      <?php echo anti_email_spam($favorites_intro_text); ?>
    </div>
  </div>
  <?php } ?>

  <?php if ($favorite_topics) { ?>
  <div class="images-4-columns">
    <div class="wrapper">
      <div class="columns">
        <?php foreach ($favorite_topics as $t) { 
        $image = $t['image'];
        $btn = $t['title_and_link'];
        $btnName = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
        $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
        $btnTarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
        ?>
        <div class="imageCol">
          <div class="inner">
          <?php if ($btnName && $btnLink) { ?>
            <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="postLink">
              <?php if ($image) { ?>
              <figure>
                <img src="<?php echo $image['url'] ?>" alt="">
              </figure>
              <?php } ?>
              <figcaption>
                <?php echo $btnName ?>
              </figcaption>
            </a>
          <?php } else { ?>
            <?php if ($image) { ?>
            <figure>
              <img src="<?php echo $image['url'] ?>" alt="">
            </figure>
            <?php } ?>
          <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>
</section>
<?php } ?>