<?php  
$featured_intro = get_field('featured_intro');
$featured_intro_bg = get_field('featured_intro_background');
$featured_intro_hasbg = ($featured_intro_bg) ? 'has-graphic-bg':'no-graphic-bg';
$featured_articles = get_field('featured_articles');
if($featured_articles) { ?>
<section class="featuredArticles <?php echo $featured_intro_hasbg ?>">
  <?php if ($featured_intro) { ?>
    <?php if ($featured_intro_bg) { ?>
    <div class="intro-wrapper intro-graphic">
      <div class="wrapper text"><?php echo anti_email_spam($featured_intro); ?></div>
    </div> 
    <?php } else { ?>
    <div class="intro">
      <div class="wrapper">
        <?php echo anti_email_spam($featured_intro); ?>
      </div>
    </div> 
    <?php } ?>
  <?php } ?>
  <div class="wrapper">
    <div class="flexwrap">
      <?php foreach ($featured_articles as $a) { 
        $image = $a['image'];
        $title = $a['title'];
        $text = $a['text'];
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
            <?php if ($title) { ?>
              <h3><?php echo $title ?></h3>
            <?php } ?>
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
</section>
<?php } ?>