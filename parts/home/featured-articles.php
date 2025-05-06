<?php  
$featured_intro = get_field('featured_intro');
$featured_articles = get_field('featured_articles');
if($featured_articles) { ?>
<section class="featuredArticles">
  <div class="wrapper">
    <?php if ($featured_intro) { ?>
    <div class="intro">
      <?php echo anti_email_spam($featured_intro); ?>
    </div> 
    <?php } ?>
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
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>