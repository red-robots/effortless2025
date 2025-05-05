<?php 
$hero_image = get_field('hero_image');
$has_hero_text = get_field('has_hero_text');
$hero_text = get_field('hero_text');
if($hero_image) { ?>
<section id="hero">
  <div class="hero-content">
    <div class="heroImage" style="background-image:url('<?php echo $hero_image['url'] ?>')"></div>
    <?php if ($has_hero_text && $hero_text) { ?>
      <div class="heroText"><?php echo anti_email_spam($hero_text); ?></div>
    <?php } ?>
    
  </div>
</section>
<?php } ?>