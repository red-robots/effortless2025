<?php get_header(); ?>
<main id="main" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php  
    $intro_text = get_field('intro_text');
    $welcome = get_field('welcome');
    $welcomeImage = ( isset($welcome['image']) ) ? $welcome['image'] : '';
    $welcomeText = (isset($welcome['details'])) ? $welcome['details'] : '';
    //print_r($welcomeText);

    if($intro_text) { ?>
      <section class="introText">
        <div class="wrapper">
          <?php echo anti_email_spam($intro_text); ?>
        </div>
      </section>
    <?php } ?>


    <?php if($welcomeImage || $welcomeText) { ?>
    <section class="welcomeText">
      <div class="wrapper">
        <div class="flexwrap">
          <?php if($welcomeImage) { ?>
          <figure class="imageCol">
            <img src="<?php echo $welcomeImage['url'] ?>" alt="<?php echo $welcomeImage['title'] ?>" />
          </figure>
          <?php } ?>
          <?php if($welcomeText) { ?>
          <div class="textCol">
            <?php echo anti_email_spam($welcomeText); ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <?php } ?>


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

  <?php endwhile; ?>
</main>

<?php
get_footer();
